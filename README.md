# PAW2020-TP2-Salinas
 Entrega del trabajo práctico 1 para Programación Web de Luján.

##Notas:

- Por cuestiones de estilo básicas, se agregan en los html etiquetas como `<br>`. Sin embargo, entendemos que dichas etiquetas no deberían utilizarse y que el estilo que deberíamos darle a la página web depende del CSS, que veremos más adelante.


##Respuestas teóricas y consideraciones de los ejercicios

**Ejercicio 1**



**1. ¿Por qué cree usted que se requiere validar los datos en ambos extremos de la comunicación?**

Se requiere validar los datos del lado del cliente por cuestiones de usabilidad. Es decir, para ayudar al usuario a ingresar los datos correctamente en el formulario a medida que los escribe y alertarle de los errores que cometa antes de enviar el formulario. Sin embargo, desde el punto de vista de la seguridad de nuestro sistema, las validaciones del lado del cliente no garantizan que los datos ingresados no sean maliciosos, ya que todos los controles que se hagan via HTML o Javascript son fáciles de evadir. Es por eso que, independientemente de las validaciones realizadas del lado del cliente, deben validarse del lado del servidor.

En nuestro caso, las validaciones del lado del servidor serán básicas, verificando únicamente que los datos ingresados no estén vacíos (en caso de ser obligatorios) y que tengan el formato esperado. No obstante, no se harán validaciones más exhaustivas como la utilización de expresiones regulares o PDO ya que (además de que los datos no son persistidos en una base de datos) consideramos que esas técnicas escapan al objetivo de este trabajo práctico.



**3. ¿Realice las modificaciones necesarias para que el script del punto anterior reciba los datos mediante el método GET. ¿Qué diferencia nota? ¿Cuándo es conveniente usar cada método? 
Consejo: Utilice las herramientas de desarrollador de su navegador (pestaña red) para observar las diferencias entre las diferentes peticiones.**

La diferencia apreciable entre el envío de datos mediante el método GET respecto al método POST es que, en el método GET, los datos ingresados viajan en la URL; mientras que en el método POST los datos viajan en el body de la petición http. Todo esto, sumado a que la longitud de una URL no es ilimitada, hacen que sea conveniente utilizar el método POST cuando los datos a ser enviados son sensibles o de mucha longitud. Caso contrario, puede utilizarse el método GET.



**4. Agregue al formulario un campo que permita adjuntar una imagen,y que la etiqueta del campo sea Diagnóstico. El campo debe validar que sea un tipo de imagen valido (.jpg o .png) y será optativo. La imagen debe almacenarse en un subdirectorio del proyecto y también debe mostrarse al usuario al mostrar el resumen del turno del ejercicio 2. ¿Qué sucede si 2 usuarios cargan imágenes con el mismo nombre de imagen? ¿Qué mecanismo implementar para evitar que un usuario sobrescriba una imagen con el mismo nombre?**
 
- Para poder adjuntar imágenes en el formulario, fue necesaio añadir en la etiqueta `<form>` el atributo `enctype="multipart/form-data"`. Sin embargo, el uso de dicho atributo requiere que el método de envío de los datos del formulario sea necesariamente POST. Usar el método GET no hace que el sistema falle, pero la carga de imágenes no funcionará.

- Las imágenes subidas mediante este form se almacenan en una carpeta llamada "images" dentro de la carpeta "core".

- Actualmente no se redimensionan las imágenes al mostrar los datos que el usuario acaba de ingresar. Consideramos que eso es parte del estilo de la página. 

- En respuesta a la pregunta de qué sucedería si dos usuarios cargan imágenes con el mismo nombre, lo que ocurre es que la última en cargarse reemplaza a la primera. Incluso si ya habían imágenes cargadas con anterioridad y se carga una nueva con el mismo nombre, la que se encontraba almacenada es reemplazada igualmente. Con lo cual se estarían perdiendo datos importantes. Para solucionar este problema, lo que hicimos fue aplicar un algoritmo de hash al nombre de la imagen pero conservando su extensión. La función hash recibe como entrada un string compuesto por el nombre temporal de la imagen, concatenado con el momento en que fue subida. De esta forma:

`$hashedName = hash("sha256" , $imgSubida['tmp_name'] . $theTime . rand(1,1000000)) . $imgExt;`

La línea anterior es parte de una función que se encarga de crear una serie de variables con datos inherentes a la imagen, generar el hash ya mencionado, crear el nuevo nombre de la imagen en base a dicho hash y crear el archivo de imagen en el directorio correspondiente. Finalmente, devuelve un string que contiene el path relativo de la imagen almacenada, para poder mostrarla en el documento HTML. Si bien el código de dicha función está comentado, aquí hay una lista detallada de lo que cada variable representa:

`$imgFolderPath` Contiene el path absoluto de la carpeta que contiene las imágenes. 
Por ejemplo: `C:\Archivos de Programa\miServer\images`

`$imgName`		Contiene el nombre de la imagen que el usuario acaba de subir y su extensión. Puede resultar deseable que el nombre original de la imagen no se pierda. Desde esta variable puede obtenerse ese nombre.
Por ejemplo: `miFoto.png`

`$imgExt`		Contiene sólo la extensión de la imagen antepuesto por un punto. 
Por ejemplo: `.png`

`$hashedName`	Contiene el nombre hasheado de la imagen y su extensión. El algoritmo de hash recibe como clave un string al cual se le concatenan el nombre temporal de la imagen dentro de `$_FILES`, el momento en que fue subida y un número aleatorio entre 1 y 1.000.000, practicamente garantizando que no se puedan generar dos valores hash iguales incluso si dos usuarios suben una imagen con el mismo nombre y al mismo tiempo.
Por ejemplo: `820bf42e937aa06025b9c3a1e486889b18e2f4a53d17da434000bca6c19bcc82.png`

`imgFileName`	Contiene el path completo de la imagen ya hasheada junto con su extensión.
Por ejemplo: `C: \Archivos de Programa\miServer\images\820bf42e937aa06025b9c3a1e486889b18e2f4a53d17da434000bca6c19bcc82.png`

`$imgRelName`	Contiene el path relativo de la imagen.
Por ejemplo: `images\820bf42e937aa06025b9c3a1e486889b18e2f4a53d17da434000bca6c19bcc82.png`

El uso de tantas variables podría haberse evitado, pero se decidió hacerlo de esta forma para, de ser necesario, poder recuperar fácilmente en el futuro estos datos.



**5. Utilice las herramientas para desarrollador del navegador y observe cómo fueron codificados por el navegador los datos enviados por el navegador en los dos ejercicios anteriores. ¿Qué diferencia nota?**

La diferencia apreciable desde la herramienta de desarrollador es que en el método POST hay 3 campos adicionales. Estos son:

`Cache-Control: max-age=0`	Impide que se puedan almacenar datos en la caché.

`Content-Length` Indica el tamaño en bytes del contenido enviado.

`Content-Type` Indica el tipo de contenido de la petición.