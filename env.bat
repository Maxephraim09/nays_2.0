@echo off
REM NAYS 2.0 - Environment Setup Script for Windows
echo 🚀 Setting up NAYS 2.0 Environment...

REM Check if .env exists
if exist .env (
    echo ⚠ .env file already exists. Creating backup...
    copy .env .env.backup.%date:~-4,4%%date:~-10,2%%date:~-7,2%_%time:~0,2%%time:~3,2%%time:~6,2%
)

REM Copy example file
copy .env.example .env

REM Generate random keys (PowerShell)
for /f %%i in ('powershell -Command "[System.Convert]::ToBase64String((1..32|%%{Get-Random -Maximum 256}))"') do set APP_KEY=base64:%%i
for /f %%i in ('powershell -Command "$key = -join ((48..57)+(65..90)+(97..122) | Get-Random -Count 32 | %%{[char]$_}); $key"') do set JWT_SECRET=%%i

echo.
echo 📦 Database Configuration:
set /p DB_HOST="Database Host [localhost]: " || set DB_HOST=localhost
set /p DB_PORT="Database Port [3306]: " || set DB_PORT=3306
set /p DB_NAME="Database Name [nays_db]: " || set DB_NAME=nays_db
set /p DB_USER="Database Username [root]: " || set DB_USER=root
set /p DB_PASS="Database Password: "

echo ✅ Environment file created successfully!
echo 📍 Location: .env
echo 🔑 APP_KEY: %APP_KEY%