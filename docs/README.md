# Docs Index

Planning, investigation, and reference notes for Aludra development. For the
plugin's user-facing README, see [../README.md](../README.md).

## Living documents

Kept up to date; read these first.

- **[PLAN-OF-ACTION.md](PLAN-OF-ACTION.md)** — the roadmap: current state, block import
  gap analysis (Nynaeve Tier A/B/C), versioning history, and open decisions.
- **[BLOCKS.md](BLOCKS.md)** — full feature details for every shipped block (moved out of
  the root README to keep it short).
- **[BLOCK-CONSOLIDATION-AND-RENAMING.md](BLOCK-CONSOLIDATION-AND-RENAMING.md)** — naming/
  overlap audit across the block library and the phased plan to address it.

## Historical / point-in-time notes

Snapshots from past work — investigations, phase plans, and reports that were accurate
when written but are not maintained going forward. Useful for context on *why* something
is built the way it is, not as a current source of truth.

**Admin settings page:**
- [ADMIN-PANEL-PLAN.md](ADMIN-PANEL-PLAN.md) — original design proposal
- [ADMIN-PANEL-IMPLEMENTATION.md](ADMIN-PANEL-IMPLEMENTATION.md) — implementation summary
- [ADMIN-PANEL-TESTING.md](ADMIN-PANEL-TESTING.md) — manual testing checklist
- [ADMIN-PANEL-CODE-REVIEW.md](ADMIN-PANEL-CODE-REVIEW.md) — PR #33 code review notes

**Mega menu:** _(consolidation candidate — see note below)_
- [MEGA-MENU-POSITIONING-INVESTIGATION.md](MEGA-MENU-POSITIONING-INVESTIGATION.md) — dropdown
  viewport-overflow investigation (unresolved as of its last update)
- [MEGA-MENU-POSITIONING-TEST-REPORT.md](MEGA-MENU-POSITIONING-TEST-REPORT.md) — Playwright
  test report for the above
- [MEGA-MENU-SPACING-AND-WIDTH-PLAN.md](MEGA-MENU-SPACING-AND-WIDTH-PLAN.md) — spacing/width
  configuration plan
- [MEGA-MENU-PATTERN-IMPROVEMENTS.md](MEGA-MENU-PATTERN-IMPROVEMENTS.md) — visual/functional
  pattern improvement proposal
- [PATTERN-LIMITATIONS.md](PATTERN-LIMITATIONS.md) — WordPress core limitations affecting
  mega menu template-part patterns

**Hybrid rewrite / phased feature work:** _(also part of the mega-menu consolidation candidate)_
- [HYBRID-REWRITE.md](HYBRID-REWRITE.md) — hybrid enhancement strategy (carousel + mega menu)
- [PHASE-2C-PLAN.md](PHASE-2C-PLAN.md) — layout mode components & styling system (complete)
- [PHASE-2D-PLAN.md](PHASE-2D-PLAN.md) — content block ecosystem (deprecated, see revised plan)
- [PHASE-2D-REVISED-PLAN.md](PHASE-2D-REVISED-PLAN.md) — template part patterns library (complete)
- [PHASE-2E-PLAN.md](PHASE-2E-PLAN.md) — advanced mega menu styling controls

> **TODO — mega-menu doc consolidation:** the two sections above (9 files total) are almost
> entirely mega-menu planning/investigation notes, several superseded by later ones
> (`PHASE-2D-PLAN.md` by `PHASE-2D-REVISED-PLAN.md`; the phase plans generally superseded by
> `HYBRID-REWRITE.md`). Worth merging into a smaller set — e.g. pairing
> `MEGA-MENU-POSITIONING-INVESTIGATION.md` with its `TEST-REPORT.md`, and folding the four
> `PHASE-2*` plans into one "mega-menu history" doc — but that's a real content-merge job
> (reconciling overlapping/superseded planning text), not a quick file move. Flagged here,
> not yet done.

**Translations & wp.org submission:**
- [CREATE_LANGUAGE_FILES.md](CREATE_LANGUAGE_FILES.md) — how to create/maintain `.po`/`.mo` files
- [LANGUAGE_FILES_SUMMARY.md](LANGUAGE_FILES_SUMMARY.md) — translation infrastructure setup summary
- [DUTCH_TRANSLATION_SUMMARY.md](DUTCH_TRANSLATION_SUMMARY.md) — `nl_NL` translation summary
- [PLUGIN_ISSUES.md](PLUGIN_ISSUES.md) — issues flagged before wp.org submission
- [FINAL_SUMMARY.md](FINAL_SUMMARY.md) — wp.org submission prep summary

**Other proposals:**
- [CARD-EFFECTS-AND-SCROLL-ANIMATIONS.md](CARD-EFFECTS-AND-SCROLL-ANIMATIONS.md) — card hover
  effects / scroll animation proposal (not yet implemented)
