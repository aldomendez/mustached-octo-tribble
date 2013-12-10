@echo off

:: Primero ponemos un buen nombre a la ventana
title Compilador de coffeeScript

:: Iniciamos el trabajo
E:\PortableApps\CoffeeScript\coffee -c ./class.coffee -o ./output

:: Esperamos para ver si hay algun error en la ventana
