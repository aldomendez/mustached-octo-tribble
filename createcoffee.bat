::@echo off

:: Primero ponemos un buen nombre a la ventana
title Compilador de coffeeScript
cd \\cymautocert\osaapp\aldo\js
pause > null
:: Iniciamos el trabajo
\\cymautocert\osaapp\aldo\js\coffee -c ./class.coffee -o ./output

:: Esperamos para ver si hay algun error en la ventana
pause > null