# Broadsheet

A block theme. Poster-on-a-wall: flat ink on paper, a visible hairline grid,
extreme contrast between display and body type, and deliberate empty stretches
as punctuation.

Version 0.1.0. Requires WordPress 6.6 or later: theme.json version 3, the
`defaultSpacingSizes` setting (6.6), and `wp:pattern` inside template parts
(6.3). The masthead uses CSS `:has()`.

Built to the conventions of Twenty Twenty-Five, the current default theme -
which is a pure block theme, not a hybrid: its only PHP file is
`functions.php`, and every template is HTML. Broadsheet is the same shape.

## The three signature moves

1. **The slip.** The site name is cut into three horizontal strips and the
   middle one is pushed sideways, as if the sheet moved through the press. The
   offset is set in `em` so it scales with the type. Below roughly 22px the
   strips merge and the word stops reading - use `.s-slip--flat` there.
2. **The bracket.** A crop mark used at two extremes of scale: a small tick
   closing a link, and a giant corner set framing a full-bleed band.
3. **One ink per band.** Never two loud inks in the same section. They
   alternate down the page - red, blue, black - and yellow appears only
   reversed out of a dark panel. Editors set a section's ink with the
   "Ink: red / blue / black" block styles on a group or columns block, which
   set `--accent` for everything inside.

## How it is put together

```
theme.json              Tokens. The single source of truth.
assets/css/
  foundation.css        Reset, base, layout. Layered.
style.css               Theme header + components. Deliberately unlayered.
assets/fonts/           Self-hosted woff2, latin subset only (~68 KB total).
styles/                 Style variations: Red press, Green press, Nightshift
parts/                  header, footer
templates/              front-page, home, index, archive, search, single, page,
                        page-no-title, 404
patterns/               Sections and parts
functions.php           Enqueues, editor styles, block styles, pattern categories
readme.txt              WordPress-format readme
screenshot.png          1200x900, as WordPress expects
```

Following Twenty Twenty-Five: `home.html` is the posts index and `index.html`
the fallback. `front-page.html` is this theme's addition - the designed landing
page - which the template hierarchy uses ahead of both.

Style variations swap the palette only. Because every component colour resolves
through `--accent` and the palette slugs, changing the seven colours in a
variation re-inks the whole site. "Nightshift" inverts paper and ink: the slugs
name roles, not literal colours.

### The layer contract

The factory's `css-foundation-spec.md` asks for a documented answer rather than
a per-project rediscovery. This is it.

**Unlayered CSS beats every `@layer` rule regardless of specificity.** In a
block theme that is decisive, because WordPress emits both its global styles
(the `theme.json` output) and its core block styles unlayered. Any component
rule of ours placed in a layer would lose to core block CSS no matter how
specific it was.

So the split is:

- `foundation.css` - reset, base, layout - **is** layered
  (`@layer reset, base, layout`). None of it needs to beat core block CSS, and
  layering keeps the reset from ambushing everything else.
- `style.css` - components - is **not** layered, and uses single-class
  selectors so plugin CSS remains overridable without `!important`.

Load order is fixed by making `foundation.css` a declared dependency of
`style.css` in `functions.php`, not by hoping the enqueue order holds.

Note that WordPress does **not** enqueue a block theme's `style.css`
automatically - there is no such hook in core's `default-filters.php`, and
Twenty Twenty-Five enqueues its own. Both files are enqueued explicitly.

### Containment

The spec proposes a named-line grid (`.l-page`) so children are contained by
default and opt out, which structurally removes the nested-wrapper
double-gutter bug. In a block theme WordPress already owns that job:
`useRootPaddingAwareAlignments` puts the gutter on the root and lets
`.alignfull` break out of it. Same idea, no wrappers to double up. So this
theme does not ship `.l-page`; it sets `contentSize`, `wideSize` and root
padding in `theme.json` and uses `alignfull` for the bands.

The one escape hatch kept is `.u-bleed`, for a full-bleed element that has to
live inside a constrained group where `alignfull` is not available.

### Tokens

`theme.json` is the only place a value is defined. `foundation.css` aliases the
emitted custom properties to short authoring names (`--ink`, `--gut`, and so
on) and defines nothing of its own. Change a colour or a step in `theme.json`
and both the front end and the editor follow.

Type and space are fluid two-point scales. Every step keeps a `rem` component -
pure `vw` sizing breaks browser zoom and fails WCAG.

### Responsive

Hairlines are a 1px gap over an ink ground, not per-cell borders, so a
four-column grid can drop to two and then one and every rule stays where it
should. Breakpoints: hero and feature stack at 1120, four-ups halve at 1120 and
stack at 620, the ledger restructures at 940 and again at 560, the masthead
tagline drops at 760.

Navigation uses `core/navigation` and its built-in responsive overlay rather
than a bespoke menu, so keyboard handling and menu management stay
WordPress's job. Only the appearance is ours.

## Fonts

Self-hosted, latin subset, woff2 only:

- **Big Shoulders Display** (700, 900) - Patric King
- **Martian Mono** (300, 400, 600) - Roman Shamin, Evil Martians

Both are under the SIL Open Font License 1.1, confirmed from the `google/fonts`
repository metadata and the foundries' own repos. The upstream `OFL.txt` for
each family travels with the files in `assets/fonts/`, as the licence requires.

One thing to watch: Google Fonts has since consolidated "Big Shoulders Display"
into a family listed simply as **Big Shoulders**. The `css2` API still serves
the Display name (v24), and the self-hosted files here are unaffected, but a
future refresh should check which name is current.

## Nothing user-facing is hardcoded

Two rules, and between them no string a site owner would want to change is
stuck in a file they cannot edit.

**Anything that lives in Settings comes from a Settings block.** The tagline is
`core/site-tagline` in both the header and the footer, so editing
Settings > Tagline changes the site. The site name reaches the slip wordmark
through `get_bloginfo( 'name' )`. Dates, titles, terms and excerpts come from
the `core/post-*` blocks.

**Everything else lives in a PHP pattern, wrapped for translation.** The
templates and template parts contain no literal copy at all - `parts/header.html`
and `parts/footer.html` are one-line pattern references, exactly as Twenty
Twenty-Five does it, and `templates/front-page.html` is five pattern references
and nothing else. Copy sits in `patterns/*.php` inside `esc_html_e()`, so it is
translatable and it is in one place.

This is not just tidiness. A pattern referenced from a template is **flattened
into real, editable blocks** the moment someone opens that template in the Site
Editor - so the copy is editable there too, while the file keeps a clean
default for a fresh install.

The wordmark is the single exception to both rules, for the reason below.

## No raw HTML in patterns

Every pattern is built from real blocks. That matters because a `wp:html`
block is opaque in the editor: you cannot click into it, you cannot swap an
image through the media library, and you cannot retype the copy. A pattern
that ships its content inside one is decoration, not a pattern.

So:

- The photograph cell is a **`core/cover`** (`patterns/plate.php`). An editor
  replaces the image, sets the focal point and writes alt text normally. The
  cover's overlay sits at zero opacity and the plate colour comes from
  `.s-plate` in CSS, so an empty cover reads as a flat placeholder and a real
  image simply covers it.
- The bracket link is a **`core/paragraph`** and the row list is a
  **`core/list`**. Their copy is ordinary editable text.
- The slogan band is a **`core/group`** holding a **`core/heading`**.

The bracket itself is drawn in CSS, not markup - a mask image painted with
`currentColor` on a pseudo element, so it recolours like an inline SVG would
without needing one. `--tick` in `foundation.css` is the shared mark; the four
crop marks framing a band are one pseudo element with four mask layers.

**The one exception is the wordmark.** The slip needs the same word four times
in one element, which no core block expresses, so `patterns/wordmark.php` and
`wordmark-small.php` use `wp:html`. Both are `Inserter: no` and both render
`get_bloginfo( 'name' )`, so the editable thing - the site title - is edited in
Settings, and nobody needs to touch the markup.

If you add a pattern, keep this rule. The validator in this README's sibling
check fails any pattern outside `wordmark*` that contains `wp:html`.

## Colour and contrast

The palette carries **two reds**. `red` is the fill - bands, tags, the wordmark
strip - where any type sitting on it is large display and 3:1 is the bar.
`red-text` is a darker red for small link labels, which need 4.5:1 on paper.
Blue and black already clear 4.5:1, so their text value is the same colour. In
CSS this is `--accent` and `--accent-text`; the ink block styles set both.

Measured against each palette's own ground:

| Pair | Ratio |
|---|---|
| ink on paper | 16.7:1 |
| quiet on paper | 4.7:1 |
| red-text link on paper | 5.1:1 |
| blue link on paper | 6.5:1 |
| yellow on blue band (large only) | 4.5:1 |
| paper on red band (large only) | 3.8:1 |

The two band pairs are large display type only and clear the 3:1 large-text
bar. Do not set small type in them.

**Never write a hex value into a pattern.** Use palette slugs
(`"backgroundColor":"blue"`, `"textColor":"yellow"`), or the section inherits
the base palette and ignores whichever style variation is active. Every
variation declares the same seven slugs for the same reason.

## Two specificity pairs that matter

The hairline grid has two rules on its children that must sit at *different*
specificities, and getting either wrong is silent:

```css
:where(.s-grid) > * { background: var(--paper); min-width: 0; }
.s-grid > *        { margin-block: 0; }
```

The background is wrapped in `:where()` - zero specificity - so a cell that
opts into a palette colour (`has-blue-background-color`) wins. The margin reset
must NOT be, because core's flow-layout margin rule is also zero-specificity
and would win on source order, pushing every cell after the first down and
exposing the grid's ink ground as a solid block.

The same trap caught the wordmark: `.s-slip__sizer` loses to `.s-slip > span`,
so the sizer needs `.s-slip > .s-slip__sizer` or every strip goes absolute and
the masthead collapses to zero height.

## Two traps worth knowing

Both of these look like they work and quietly do not. Both were caught only by
running the theme, not by reading it.

**A custom spacing scale is ignored unless you also turn off the default one.**
Setting `settings.spacing.spacingSizes` is not enough, and neither is adding
`spacingScale: { steps: 0 }`. WordPress keeps its own generated scale under the
`default` origin alongside yours under `theme`, and the default wins on the
shared slugs 20-70 - so `--wp--preset--spacing--40` stays at core's `1rem` while
`WP_Theme_JSON_Resolver::get_theme_data()` cheerfully reports your value. The
fix is `"defaultSpacingSizes": false`, the spacing equivalent of
`"defaultPalette": false`. Check the served page, not the resolver:

```
curl -s <site> | grep -o -- "--wp--preset--spacing--40: [^;]*"
```

**A saved style variation replaces the theme palette wholesale.** Once someone
picks a variation in the editor, WordPress writes the whole palette into a
`wp_global_styles` post. Adding a new colour slug to `theme.json` after that
will not reach the site - the saved seven-colour palette wins over the theme's
eight, and the new custom property is simply absent. Hence the fallback on
`--red-text` in `foundation.css`. To pick up a genuinely new slug, reset styles
in Appearance > Editor > Styles, or update the saved post.

**Theme pattern and template changes are cached, and on the front end that
cache can be badly stale.** Editing a pattern file, or adding a new one, can
leave the site rendering the previous set - a template part whose only content
is a reference to a not-yet-registered pattern renders as an empty div, with no
error anywhere. WP-CLI will cheerfully report the new pattern as registered
while web requests still see the old list, because they are different processes
hitting different caches.

While developing, set this in `wp-config.php`:

```php
define( 'WP_DEVELOPMENT_MODE', 'theme' );
```

That switches the theme file caches off. Without it, `wp_get_theme()->delete_pattern_cache()`
clears the cache for the process that runs it and not necessarily for the next
web request. Check the front end, not WP-CLI.

**Pattern header changes are cached per theme, and `wp transient delete --all`
does not reliably clear them.** Edit a pattern's `Categories:` or
`Viewport width:` and the registry keeps serving the old values. Use:

```
wp eval 'wp_get_theme()->delete_pattern_cache();'
```

The same shape of problem as the ACF Local JSON trap in the dev-root
`CLAUDE.md`: a source file that appears authoritative while a cached or default
copy is what actually renders.

## Known gaps

- Pattern copy is placeholder, and anything in `[square brackets]` is a real
  fact that needs filling in.
- `patterns/plate.php` draws a stand-in where a photograph goes. Replace those
  with real image blocks; delete `.s-plate` from `style.css` once none remain.
- No `style.min.css`. Twenty Twenty-Five ships one and enqueues it unless
  `SCRIPT_DEBUG`; this theme has no build step, so it serves the source.
- Not translated beyond the strings in `functions.php`; there is no
  `languages/` directory yet.
