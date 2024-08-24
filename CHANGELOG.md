# Changelog

## Version 3.x (for phpBB 3.3)

### 3.0.1 - 2024-01-18

- Rules in the ACP are clickable again, fixes an issue introduced in v3.0.0..
- Updated French and Brazilian translations.
- Added Finnish Translation.

### 3.0.0 - 2023-05-29

- Dropped support for phpBB 3.2 and PHP 5.
- New minimum requirements: phpBB 3.3.2 and PHP 7.1.3.
- Fixed potential installation problems when default phpBB roles do not exist.
- Rules in the ACP are no longer clickable like Rule Categories, to avoid any confusion.
- Internal code improvements
- Updated Chinese, Turkish and German language packs.
- Added Ukrainian language pack.

## Version 2.x (for phpBB 3.2)

### 2.1.3 - 2021-05-28

- Added a new setting to choose whether rule and category list items be preceded by alphanumeric ordinals, bullets or nothing.
- Fixed links to FontAwesome from the ACP Rules Settings page.
- Slightly adjusted the Rule Categories side-menu on the rules page to inherit more styling from the parent style, so it will be more compatible with 3rd party styles.
- Added a more in-depth description to Board Language option screen in the ACP.
- Fixed PHP 8 and JavaScript errors.

### 2.1.2 - 2019-11-20

- Dropped support for subsilver2 style (and subsilver2 based styles).
- Various code improvements, including converting to Twig template syntax.
- Language packs added:
    - Danish
    - Hungarian

### 2.1.1 - 2017-05-28

- Fixed a bug where some older MySQL databases would fail to update or install.
- Fixed a trivial potential security issue.
- Fixed an unnecessary call to load Font Awesome in the ACP.
- Updated confirmation messages when deleting either a rule or rule category.

### 2.1.0 - 2017-05-07

- Default language fallback: if board rules do not exist for an installed language, the rules written in the board's default language will be shown instead (if they exist).
- Major code improvements and optimisations.

### 2.0.0 - 2017-01-16

- Updated for phpBB 3.2 (continue using the 1.x branch for phpBB 3.1.x)
- New minimum requirements: phpBB 3.2.0 and PHP 5.4
- Option to set your own (supported) Font Awesome icon for the Rules nav-bar link

## Version 1.x (for phpBB 3.1)

### 1.0.4 - 2016-12-02

- Fixed some rare cases where errors caused a blank page. They are now caught, resulting in a proper error message.
- Fixed some missing language keys in rare error messages from the nestedset class.
- Fixed an issue in the ACP where the "Rule parent" field would not retain its value when previewing a rule or getting a warning message.
- Fixed an issue where the AJAX processing indicator was not displaying in the ACP when moving rules up/down.
- Ensure compatibility with Symfony in future phpBB releases.
- Major code improvements and optimisations.
- Language packs added:
    - Brazilian-Portuguese
    - Bulgarian
    - Norwegian
    - Slovak

### 1.0.3 - 2016-01-17

- The same anchor names can now be shared between languages.
- Fixed an issue that prevented rules from being updated on MSSQL systems.
- Language packs added:
    - German (Formal Honorifics)
    - Mandarin Chinese (Simplified Script)

### 1.0.2 - 2015-05-24

- Fixed an issue where postgreSQL and MSSQL dbms could not save rules with more than 4,000 characters.
- Added a new template var `S_BOARD_RULES` that styles can use when viewing the rules page.
- Added a table header to the rule lists in the ACP (visual improvement).
- Coding improvements.
- Language packs added:
    - Arabic
    - Croatian
    - Czech
    - German
    - Greek
    - Hebrew
    - Italian
    - Polish
    - Portuguese
    - Romanian
    - Russian
    - Swedish
    - Turkish
- Require phpBB 3.1.3 or newer.

### 1.0.1 - 2014-11-03

- Fixed an issue where rules could not be deleted with phpBB 3.1.1.
- Fixed an issue where rules could not be created on postgreSQL databases.
- Allow rule parents to be changed when adding/editing rules.
- Hide the rule message editor when editing a rule category.
- Remove the Reset button from rule editing forms.
- Language packs added:
    - Spanish
    - French
    - Dutch
    - Estonian

### 1.0.0 - 2014-10-22

- First release
