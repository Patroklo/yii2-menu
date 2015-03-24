# Yii2 Menu Widget
Menu widget that loads Kartik sidenav widget with database items.

## What's Menu Widget?

This widget gets from database a group of ordered and hierarchical items and loads them into the Kartik sidevan widget.

Developed by Joseba Juániz ([@Patroklo](http://twitter.com/Patroklo))

## Minimum requirements

* Yii2
* Php 5.4 or above

## Future plans

* None right now.

## License

This is free software. It is released under the terms of the following BSD License.

Copyright (c) 2014, by Cyneek
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions
are met:
1. Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer in the
   documentation and/or other materials provided with the distribution.
3. Neither the name of Cyneek nor the names of its contributors
   may be used to endorse or promote products derived from this software
   without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER "AS IS" AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

## Instalation

* Install [Yii 2](http://www.yiiframework.com/download)
* Install package via [composer](http://getcomposer.org/download/) 
		
		"cyneek/yii2-menu": "dev-master"

* Launch the migration

        ```
         php yii migrate --migrationPath=@vendor/cyneek/yii2-menu/migrations
        ```

* Profit!


## Widget definition

The first step is to fill the menu table with a menu structure. This can be achieved with the built-in methods of the MenuItems ActiveRecord:

### add_menu_item

* label (String) (obligatory)
> Defines the text that will be shown for this menu item in the SideNav Widget.

* url (String) (optional)
> The url where the menu item will link in the sidenav.

* parent (String) (optional)
> Name of the parent menu item. This will create a hierarchical menu.

* name (String) (optional)
> Name of the menu item, if not defined, will use the label text.

* icon (String) (optional)
> CSS Bootstrap icon name that will be shown next to the menu item text.

* options (String) (optional)
> HTML Options that will be added into the menu item.

* visible (String) (optional)
> If 0, the menu item and all its children won't be shown at the sidenav.


### delete_menu_item

Warning: It deletes the menu item and all its children.

* name (String) (obligatory)
> Name of the menu item, that will be deleted.

### hide_menu_item

Warning: This will hide the menu item and all its children.

* name (String) (obligatory)

### show_menu_item

* name (String) (obligatory)


## Widget use

```
    echo \cyneek\yii2\menu\Menu::widget($options);
```

Options is an array as defined in the [Kartik Sidenav Widget Options](http://demos.krajee.com/widget-details/sidenav).