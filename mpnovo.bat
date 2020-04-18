@echo off
cls
:menu
cls

echo            MENU TAREFAS
echo  ==================================
echo * 1. Template                      * 
echo * 2. Arquivo php                   *
echo * 3. Arquivo scss                  *                         
echo * 4. Sair                          *                         
echo  ==================================


set /p opcao= Escolha uma opcao: 
echo ------------------------------
if %opcao% equ 1 goto opcao1
if %opcao% equ 2 goto opcao2
if %opcao% equ 3 goto opcao3
if %opcao% equ 4 goto opcao4

:opcao1
cls
set/p nome=Digite o nome do arquivo 
copy NUL %nome%.php
echo mpinit>>%nome%.php
echo. >>%nome%.php
echo #_%nome%>>%nome%.php
cd %CD% /includes/css
copy NUL _%nome%.scss
echo @import "core/config"; >>_%nome%.scss
echo @import "core/mixin"; >>_%nome%.scss
echo. >>_%nome%.scss
echo #_%nome%{} >>_%nome%.scss
echo @import "%nome%";>>app.scss
cd "../../"
pause
goto menu


:opcao2
cls
set/p nome=Digite o nome do arquivo 
copy NUL %nome%.php
echo .
cd "../../"
pause
goto menu

:opcao3
cls
set/p nome=Digite o nome do arquivo 
echo .
cd %CD% /includes/css
copy NUL _%nome%.scss
echo #_%nome%{}>>_%nome%.scss
echo @import "%nome%";>>app.scss
cd "../../"
pause
goto menu

:opcao4
cls
exit