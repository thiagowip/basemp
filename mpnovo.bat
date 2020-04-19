@echo off
cls
:menu
cls

echo            MENU TAREFAS
echo  ==================================
echo * 1. Template                      * 
echo * 2. Arquivo php                   *
echo * 3. Arquivo scss                  *
echo * 4. Atualizar Core                *
echo * 5. Adicionar Sendgrid            *                                
echo  ==================================


set /p opcao= Escolha uma opcao: 
echo ------------------------------
if %opcao% equ 1 goto opcao1
if %opcao% equ 2 goto opcao2
if %opcao% equ 3 goto opcao3
if %opcao% equ 4 goto opcao4
if %opcao% equ 5 goto opcao5

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
@echo off
cls
:menu_core
cls
echo           ATUALIZAR CORE
echo  ==================================
echo * 1. Post                          * 
echo * 2. SCSS                          *
echo * 3. LIB                           *                            
echo * V. Voltar                       *                            
echo  ==================================

set /p opcao_core= Escolha uma opcao: 
echo ------------------------------
if %opcao_core% equ 1 goto core_post
if %opcao_core% equ 2 goto core_scss
if %opcao_core% equ 3 goto core_lib
if %opcao_core% equ v goto menu


:core_post
for %%I in (.) do set CurrDirName=%%~nxI
copy c:\wget.exe d:\xampp\htdocs\%CurrDirName%
copy c:\7z.exe d:\xampp\htdocs\%CurrDirName%
wget https://github.com/thiagowip/basemp/archive/master.zip
7z x master.zip
xcopy /S/E d:\xampp\htdocs\%CurrDirName%\basemp-master\post\*.* d:\xampp\htdocs\%CurrDirName%\post\
del /Q master.zip
RD /S/Q basemp-master
del /Q wget.exe
del /Q 7z.exe
del .wget-hsts
echo ########################################
echo #### Operacao realizado com sucesso ####
echo ########################################
pause
goto menu_core

:core_scss
for %%I in (.) do set CurrDirName=%%~nxI
copy c:\wget.exe d:\xampp\htdocs\%CurrDirName%
copy c:\7z.exe d:\xampp\htdocs\%CurrDirName%
wget https://github.com/thiagowip/basemp/archive/master.zip
7z x master.zip
xcopy /S/E d:\xampp\htdocs\%CurrDirName%\basemp-master\includes\css\core\*.* d:\xampp\htdocs\%CurrDirName%\includes\css\core\
del /Q master.zip
RD /S/Q basemp-master
del /Q wget.exe
del /Q 7z.exe
del .wget-hsts
echo ########################################
echo #### Operacao realizado com sucesso ####
echo ########################################
pause
goto menu_core
exit

:core_lib
IF EXIST d:\xampp\htdocs\%CurrDirName%\includes\lib\ (
echo .
echo .
echo .
echo .
echo .
echo ##################################################
echo #### Pasta existente, atualizando os arquivos ####
echo ##################################################
echo .
echo .
echo .
echo .
echo .
) ELSE (
mkdir d:\xampp\htdocs\%CurrDirName%\includes\lib\
echo .
echo .
echo .
echo .
echo .
echo #################################################################################
echo #### Criou a pasta lib no diretorio: d:\xampp\htdocs\%CurrDirName%\includes\ ####
echo #################################################################################
echo .
echo .
echo .
echo .
echo .
)
for %%I in (.) do set CurrDirName=%%~nxI
copy c:\wget.exe d:\xampp\htdocs\%CurrDirName%
copy c:\7z.exe d:\xampp\htdocs\%CurrDirName%
wget https://github.com/thiagowip/basemp/archive/master.zip
7z x master.zip
xcopy /S/E d:\xampp\htdocs\%CurrDirName%\basemp-master\includes\lib\*.* d:\xampp\htdocs\%CurrDirName%\includes\lib\
del /Q master.zip
RD /S/Q basemp-master
del /Q wget.exe
del /Q 7z.exe
del .wget-hsts
echo ########################################
echo #### Operacao realizado com sucesso ####
echo ########################################
pause
goto menu_core
exit

:opcao5
for %%I in (.) do set CurrDirName=%%~nxI
copy c:\wget.exe d:\xampp\htdocs\%CurrDirName%
copy c:\7z.exe d:\xampp\htdocs\%CurrDirName%
wget https://github.com/thiagowip/basemp/archive/master.zip
7z x master.zip
mkdir implement
xcopy /S/E d:\xampp\htdocs\%CurrDirName%\basemp-master\implement\*.* d:\xampp\htdocs\%CurrDirName%\implement\
del /Q master.zip
RD /S/Q basemp-master
del /Q wget.exe
del /Q 7z.exe
del .wget-hsts
pause
goto menu
exit

:opcao10
cls
goto menu
exit