# up-cpt

Sous-module contenant les Custom Post Types et taxonomies standards utilisés pour les projets hôteliers.

## Arborescence

- **[CPT]** `cpt-rooms.php`, `cpt-events.php`, `cpt-offers.php`, `cpt-reviews.php`, `cpt-testimonials.php`, `cpt-portfolio.php`, `cpt-news.php`, `cpt-land.php`, `cpt-property.php`.
- **[Taxonomies]** `tax-rooms.php` (catégories/équipements reliés au CPT `rooms`).
- **[Langues]** `languages/up-cpt-fr_FR.po` et `up-cpt-fr_FR.mo`.

## Conventions

- Les fichiers CPT commencent par `cpt-`, les taxonomies par `tax-`.
- Textdomain unique `up-cpt`, chargé via `plugins_loaded` + filtre `up_cpt_textdomain_path`.
- Slugs par défaut en français (ex. `chambres`, `offres`, `evenements`).
- Filtres disponibles pour personnaliser slug et arguments :
  - `up_cpt_{posttype}_slug`, `up_cpt_{posttype}_args`, `up_cpt_{posttype}_{slug}_args`.
  - `up_tax_rooms_category_slug`, `up_tax_rooms_feature_slug`, etc.

## Traductions

- Modifier `languages/up-cpt-fr_FR.po`, puis compiler avec :
  ```bash
  msgfmt languages/up-cpt-fr_FR.po -o languages/up-cpt-fr_FR.mo
  ```
- Ajouter d’autres locales en suivant le même schéma (`up-cpt-xx_YY.po/mo`).

## Intégration

- Inclure chaque fichier nécessaire dans le bootstrap principal (ex. `require_once __DIR__ . '/cpt-rooms.php';`).
- Après activation ou changement de slug, rafraîchir les permaliens WordPress.
