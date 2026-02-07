#!/bin/bash

# Colores melos
VERDE="\e[1;32m"
CYAN="\e[1;36m"
RESET="\e[0m"

clear
echo -e "${CYAN}==============================================${RESET}"
echo -e "${VERDE}    INSTALADOR OFICIAL NAMETECHDEVZ VPS     ${RESET}"
echo -e "${CYAN}==============================================${RESET}"

# 1. Actualizar sistema
echo -e "\n${VERDE}[+]${RESET} Actualizando servidor..."
apt update -y && apt upgrade -y

# 2. Instalar Servidor Web y PHP
echo -e "${VERDE}[+]${RESET} Instalando Apache y PHP con soporte SSH..."
apt install apache2 php libapache2-mod-php php-ssh2 wget git -y

# 3. Limpiar carpeta web y descargar tu panel
echo -e "${VERDE}[+]${RESET} Descargando Panel Web desde GitHub..."
rm -rf /var/www/html/index.html
wget -O /var/www/html/index.php https://raw.githubusercontent.com/Nametechdevz/mi-script-vps/main/index.php

# 4. Permisos de seguridad
echo -e "${VERDE}[+]${RESET} Configurando permisos..."
chown -R www-data:www-data /var/www/html/
chmod -R 755 /var/www/html/

# 5. Finalizar
systemctl restart apache2
echo -e "\n${CYAN}==============================================${RESET}"
echo -e "${VERDE}     ¡INSTALACIÓN COMPLETADA EXITOSAMENTE!    ${RESET}"
echo -e " Accede a tu panel en: http://$(hostname -I | awk '{print $1}')"
echo -e "${CYAN}==============================================${RESET}"
