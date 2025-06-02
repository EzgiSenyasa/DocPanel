@echo off
title PHP Server Başlatılıyor...
cd /d C:\wamp64\bin\php\php8.4.0
php.exe -S localhost:8000 -t C:\Coding\DocPanel
echo PHP Server Çalışıyor... Kapatmak için CTRL+C bas.
pause