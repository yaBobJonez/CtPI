# Options

Currently CtPI has 3 options such as output type, clear prev. on open and pixels spacing user able to choose between and a single
"Current config" table for better understanding.

### Output type
This option allows you to choose what format the generated image encoded using. Currently only 3 formats available:
png (recommended), jpeg and gif. What is the difference? PNG supports pixels transparency and sharp contrast, that's why it's the
format that suits CtPI the best way and is recommended. For best quality and small size of an image, use JPEG. For simplified
graphics you should use GIF. It doesn't really affect much the recognization of colors although it is still recommended to use PNG.
The image is still being only encoded into one of these formats, but it is being saved with custom .ectp extension.

### Pixels spacing
This option is just for decorational purporses and people with visual impacts. When an image is pretty big, sometimes looking on
it can cause some illusions because the every pixel is different color. Making pixels spacing bigger allows you to create some
kind of indentation and makes the image more pleased to look on. Although, the bigger spacing reduces the maximum allowed characters,
for example, with spacing 0 (solid image), you can use up to est. 140,000 of characters, but with spacing 1, only 35,000.

### Clear prev. on open
This option does very simple job. Assuming, you just had decoded an image into text, you opened to decode an another image. What will
happen to the previous text? If this option is toggled, the prev. text will be erased, but when is un-toggled, the new image will
be still decoded but the new text will append to the previous.
