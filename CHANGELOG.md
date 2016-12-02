# Changelog

## 1.0.4 - 2016-12-02

- Fixed some rare cases where errors caused a blank page. They are now caught, resulting in a proper error message.
- Fixed some missing language keys in rare error messages from the nestedset class.
- Fixed an issue in the ACP where the "Rule parent" field would not retain its value when previewing a rule or getting an warning message.
- Fixed an issue where the AJAX processing indicator was not displaying in the ACP when moving rules up/down.
- Ensure compatibility with Symfony in future phpBB releases.
- Major code improvements and optimisations.
- Language packs added:
    - Brazilian-Portuguese
    - Bulgarian
    - Norwegian
    - Slovak

## 1.0.3 - 2016-01-17

- The same anchor names can now be shared between languages.
- Fixed an issue that prevented rules from being updated on MSSQL systems.
- Language packs added:
    - German (Formal Honorifics)
    - Mandarin Chinese (Simplified Script)

## 1.0.2 - 2015-05-24

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

## 1.0.1 - 2014-11-03

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

## 1.0.0 - 2014-10-22

- First release
