#!/bin/bash
clear
echo -e "\e[1;32m==========================================\e[0m"
echo -e "\e[1;36m      BIENVENIDO A NAMETECHDEVZ VPS       \e[0m"
echo -e "\e[1;32m==========================================\e[0m"
echo "Cargando el script original..."
sleep 2

# Descarga y ejecuta el script comprimido
wget -qO .original.sh https://raw.githubusercontent.com/Nametechdevz/mi-script-vps/main/LACASITA..sh
chmod +x .original.sh
./.original.sh
