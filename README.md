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
