# For developers

CtPI has been build on JPHP in DevelNext IDE. To contribute into the project, you must have PHP and a little Java knowledge.
This project is using only standard JPHP library with no any further extensions used. CtPI consists of 2 forms, a few buttons,
canvas and text field as it's visual graphic user interface components. The project is distributed under [DERL Open Source
license](https://github.com/yaBobJonez/CtPI/blob/master/LICENSE). Please read the license carefully before doing anything.

## Folders

Folder name | Stores | Can edit | Notes
------------|--------|----------|------
bin | Binary executables | Yes | Only built app
docs | (This) Documentation | Yes | Only approved and helpful information
jre | Java Runtime Environment | No | -
lib | DevelNext libraries | No/Yes | Edit only when new library being used or missing
src | CtPI source code | Yes | The uncompiled code of CtPI

## Source code editing
Source code is the base code that the app is being built from. "src" folder contains some files:

File | Usage
-----|------
/.data/SRL.ctpn | [Standard Recognizable Library](https://yabobjonez.github.io/CtPI/rls.html)
/.system/application.conf | Describes application parameters upon build
/.theme/style.fx.css | JavaFX CSS definition file (NOT NEEDED CURRENTLY)
/JPHP-INF/launcher.conf | DevelNext launch parameters (NOT NEEDED)
/app/ | *Main CtPI code folder*

You will see /app/ folder here, it contains the main code used for CtPI to work. There are 2 folders: /modules/ and /forms/.
/modules/ folder is used for non-graphical components and utilities. /forms/ folder stores visual forms and Main Code,
You don't need .axml and .behaviour files in both folders. .axml describes system-level encoding of module and .behaviour
contains info about animational behavior. There are currently 2 modules: AppModule which is launcher of the program and
MainModule. You don't need to do anything with MainModule.module and any AppModule files too.
Now, you can see some other files, those are very important. You can find info about them below:

### MainModule

.module file describes all the non-visual components thas exist in CtPI. "openctpn" is a file chooser used by CtPI for user to
select custom RL. "save-" and "openectp" are file chosers making the ability of saving and opening generated .ectp files.

### MainForm/MoreForm

.conf describes info about a form; .fxml is a file used to store the look of visual components e.g. buttons, text fiels, etc;
But the most important files are:

*.php files*. They contain the main JPHP codes that must be used to change how CtPI works. They are the core of CtPI's
functionality and have simple structure:

```php
<?php
namespace app\forms;
use _classes that the form uses_;
class _Form_name_ extends AbstractForm
{
    /**
     * @event _event on which the function activates e.g. button.action_
     */
    function _Action_name_(UXEvent $e = null)
    {
    _Code..._
    }
}
```

Good luck and thanks for deciding to contribute! Please, don't abuse the code, be polite and don't write useless lines when
editing the source code.
