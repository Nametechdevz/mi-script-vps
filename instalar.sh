#!/bin/bash
# INSTALADOR OFICIAL - SCRIPTMOD LACASITA

# Limpiar pantalla
clear

# Actualizar el sistema (como en tu comando)
echo -e "\e[1;32mActualizando paquetes del sistema...\e[0m"
apt update -y && apt upgrade -y

# Verificar dependencias básicas
echo -e "\e[1;34mInstalando dependencias necesarias...\e[0m"
apt install wget curl git unzip -y

# Crear directorio de trabajo
mkdir -p /etc/lacasita
cd /etc/lacasita

# Descargar los archivos del MOD
echo -e "\e[1;33mDescargando archivos de configuración...\e[0m"
wget --no-check-certificate https://raw.githubusercontent.com/lacasitamx/SCRIPTMOD-LACASITA/master/Archivos/modulos.zip

# Descomprimir y dar permisos
unzip modulos.zip
chmod +x *
chmod 777 /etc/lacasita/*.sh

# Ejecución del Menú Principal
# Este comando llama al menú que ya está dentro del VPS
./menu.sh
