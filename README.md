# bingo-overlay

Single bingo board overlay for Twitch/OBS with a small editor that writes JSON next to the files. Pure HTML/JS/CSS plus one PHP endpoint for saving.

## Files

- `bingo.html` – read-only overlay for OBS/browser source
- `bingoedit.html` – editor UI to change title, colors, and 25 text fields
- `save-texts.php` – receives editor updates and writes JSON files
- `bingo-texts.json` – example data loaded by the overlay
- `Caramel.ttf` – title font used by both pages
- `bingo.mp3` – optional win jingle

## Requirements

- Web host with PHP to allow `save-texts.php` to write JSON files
- OBS (browser source) or any static host for the overlay itself

## Quickstart

1. Upload the folder to a PHP-capable host (web user must be allowed to write).
2. Open `bingoedit.html`, fill in the board, and click **Speichern** (writes `bingo-texts.json` and `config.json`).
3. Add `https://your-domain/path/bingo.html` as a browser source in OBS.
4. Optionally trigger `bingo.mp3` in OBS for the win sound.

## Customizing

- Colors/layout live directly in `bingo.html` and `bingoedit.html` CSS.
- Duplicate the folder to create another board with its own JSON/config.
- `save-texts.php` allows same-origin writes; adjust headers if you proxy it elsewhere.

Development: no build tooling needed. You can open the HTML files locally to experiment; keep `config.json` out of version control (already ignored).
