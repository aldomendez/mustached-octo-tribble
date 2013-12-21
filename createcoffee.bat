::@echo off

:: Primero ponemos un buen nombre a la ventana
title Compilador de coffeeScript
cd C:\apps
:: Creamos una unidad temporal
pushd \\cymautocert\osaapp\diamnd\
pause > null
:: Iniciamos el trabajo
c:\apps\coffee -c ./class.coffee

:: Desmontamos la unidad virtual
popd
:: Esperamos para ver si hay algun error en la ventana
pause > null