
class Mercancia{
  constructor(){
    
    this.pila = {};
    this.count = 0;

  }

  push(item){ //insertar un dato al final de la pila
    
    this.pila[this.count] = item ;
    this.count ++;
    return this.pila;
  
  }

  pop(){ //genero mi función para extraer último dato de la pila

    this.count --;
    const item = this.pila[this.count];
    delete this.pila[this.count];
    return item;

  }

  peek(item){ // muestra el último dato insertado
    delete this.pila[item];
    return this.pila;
    //return this.pila; //retorna lo que hay en el final de la pila 

  }

  size(){//muestra el tamaño del objeto

    return this.count;

  }
  print(){ //muestra lo que hay en el objeto

    console.log(this.pila);

  }


}
