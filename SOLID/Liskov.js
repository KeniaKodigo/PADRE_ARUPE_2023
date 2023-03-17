/**
 * Sustitucion LISKOV: Las clases hijan deben reemplazar a las clases padres
 */

class TareasDevelopers{

    maquetar(){
        //code..
    }

    codificar(){
        //code..
    }

    testearCodigo(){
        //code..
    }

    liderarProyectos(){
        //code..
    }
}

class ScrumMaster extends TareasDevelopers{
    liderarProyectos(){
        //code..
    }

    maquetar(){
        return "El scrum master ya no maqueta";
    }
}

class FullStack extends TareasDevelopers{
    maquetar(){
        //code..
    }

    codificar(){
        //code..
    }

    testearCodigo(){
        //code..
    }

    liderarProyectos(){
        throw new Error("Un fullstack no lidera proyectos");
    }
}


class tareasProgramador{
    maquetar(){
        //code..
    }

    codificar(){
        //code..
    }

    testearCodigo(){
        //code..
    }
}

class tareasLideres{
    liderarProyectos(){
        //code..
    }
}


class ScrumMaster2 extends tareasLideres{
    liderarProyectos(){
        //code..
    }
}

class FullStack2 extends tareasProgramador{
    maquetar(){
        //code..
    }

    codificar(){
        //code..
    }

    testearCodigo(){
        //code..
    }
}