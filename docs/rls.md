# Recognizable Libraries

Recognizable Libraries (RLs) are JSON-structured .ctpn files those contain data for CtPI what character to encode into what color.
Those libraries allow you to customize the "cypher" and support almost every Unicode character and every possible color. RLs support
3 kinds of color definitions: color hex (#RRGGBB; recommended), simple names (black, green, etc.) and hex with transparency
(#RRGGBBAA; still in W.I.P.).

## Standard RL

SRL is standard RL compiled into the software and provided as default upon CtPI launch. Here you can find the default configuration: [SRL.ctpn](https://github.com/yaBobJonez/CtPI/blob/master/src/.data/SRL.ctpn).

## Custom RLs

At first, you have to create somewhere a file YOURNAME.ctpn; then, open this file with any text (/JSON) editor and write your RL
that looks like that:
```json
{
  "FIRST_CHARACTER_HERE": "#RRGGBB",
  "SECOND_CHARACTER_HERE": "blue",
  "LAST_CHARACTER": "#RRGGBBAA"
}
```
**NOTICE!**
Letters are written as they are ("A", "B, "C", etc.),
numbers must have "n" prefix before them ("n0", "n1", "n2", etc.),
most of the special symbols can be written also as they are (".", "!", "?", etc.),
although there are some characters that require special encoding for compatibility, they are written below:

Character | Encoding Name
----------|--------------
' | \\'
" | \\"
Spacebar space | SPACE
New line (\n) | NEWLINE

Then, save your file and close. To use your custom RL, open CtPI and click "Inject RL". You will be prompted to select your RL .ctpn file. Choose it and click "Open" in the file selector.
