#!/bin/bash

# Colores para que se vea Pro
VERDE="\e[1;32m"
AZUL="\e[1;34m"
RESET="\e[0m"

clear
echo -e "${AZUL}==========================================${RESET}"
echo -e "${VERDE}    INSTALADOR MAESTRO - NAMETECHDEVZ     ${RESET}"
echo -e "${AZUL}==========================================${RESET}"

# 1. Actualización del Sistema
echo -e "\n${AZUL}[1/3]${RESET} Actualizando paquetes..."
apt update -y && apt upgrade -y

# 2. Instalación de Dependencias Web
echo -e "\n${AZUL}[2/3]${RESET} Instalando Apache, PHP y SSH2..."
apt install apache2 php libapache2-mod-php php-ssh2 git wget -y

# 3. Descarga del Panel Web (Opcional: Clonar tu propia web)
echo -e "\n${AZUL}[3/3]${RESET} Configurando Panel de Control..."
# Aquí podrías descargar tus archivos .php a /var/www/html/
# wget https://tu-sitio.com/panel.zip -O /var/www/html/panel.zip

# 4. Configuración de Seguridad Inicial
ufw allow 80/tcp
ufw allow 443/tcp
ufw allow 22/tcp
echo "y" | ufw enable

echo -e "\n${VERDE}==========================================${RESET}"
echo -e "      INSTALACIÓN COMPLETADA CON ÉXITO    "
echo -e " Accede a tu panel en: http://$(hostname -I | awk '{print $1}')"
echo -e "${VERDE}==========================================${RESET}"
