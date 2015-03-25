# Yii2 Menu Widget
Widget de menú que muestra el widget Sidenav de Kartik con items cargados de la base de datos.

## ¿Qué es Menu Widget?

Este widget obtiene de la base de datos un grupo de items ordenados y jerarquizados y los carga en el widget de Kartick Sidenav.

Developed by Joseba Juániz ([@Patroklo](http://twitter.com/Patroklo))

## Requisitos mínimos

* Yii2
* Php 5.4 or superior

## Future plans

* Ninguno por ahora.

## Licencia

Esto es software libre. Está liberado bajo los términos de la siguiente licencia BSD

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


## Instalación

* Instalar [Yii 2](http://www.yiiframework.com/download)
* Instalar el paquete vía [composer](http://getcomposer.org/download/) 
		
		"cyneek/yii2-menu": "dev-master"

* Lanzar la migración


         php yii migrate --migrationPath=@vendor/cyneek/yii2-menu/migrations


* Profit!


## Definición del widget

El primer paso es rellenar la tabla de menú con una estructura. Esto puede hacerse con los métodos existentes en el ActiveRecord MenuItems:

### add_menu_item

* label (String) (obligatorio)
> Define el texto que se mostrará para este ítem de menú en el Widget Sidenav.

* url (String) (opcional)
> La url a la que redireccionará el ítem.

* parent (String) (opcional)
> Atributo name del ítem de menú padre. Esto creará un menú jerárquico.

* name (String) (opcional)
> Nombre del ítem del menú, si no está definido, se usará el texto del campo Label.

* icon (String) (opcional)
> Nombre del icono CSS de Bootstrap que se mostrará al lado del texto del ítem del menú.

* options (String) (opcional)
> Opciones HTML que se añadirán al ítem del menú.

* visible (String) (opcional)
> Si es 0, el ítem del menú y todos sus hijos no aparecerán en el sidenav.


### delete_menu_item

Atención: Borra la entrada y todos sus hijos.

* name (String) (obligatorio)
> Nombre del ítem del menú que será eliminado.

### hide_menu_item

Atención: Esto ocultará el ítem del menú y todos sus hijos.

* name (String) (obligatorio)

### show_menu_item

* name (String) (obligatorio)


## Uso del widget

```
    echo \cyneek\yii2\menu\Menu::widget($options);
```

Options es un array definido en la sección de [Opciones del Widget Kartik Sidenav](http://demos.krajee.com/widget-details/sidenav#sidenav-options).
