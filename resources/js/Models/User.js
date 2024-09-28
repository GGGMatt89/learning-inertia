export default class User{
    constructor(attributes = {}){
        Object.assign(this, attributes);
    }
    //transfer data from backend side models to JS objects as client side models

    //-> then I can manipulate them with methods
    follows(user){
        return true;
    }

    isALifer(){
        return false;
    }
}
