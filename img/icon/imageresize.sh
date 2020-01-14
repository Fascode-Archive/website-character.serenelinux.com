for i in `seq 16 1024`
do
  convert -resize $ix$i 1024.png $i.png
  echo "i = $i";
done
~                          
