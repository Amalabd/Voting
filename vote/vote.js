const app = Vue.createApp({
    data() {
      return {
       
       a1: 0,
       a2: 0,
       a3: 0,
       a4: 0,
       b1: 0,
       b2: 0,
       b3: 0,
       b4: 0,
       c1: 0,
       c2: 0,
       c3: 0,
       c4: 0,
       active: false,
       active2: false,
       active3: false,
       active4: false,
       active5: false,
       active6: false,
       active7: false,
       active8: false,
       active9: false,
       active10: false,
       active11: false,
       active12: false,
       tot1:0,
       tot2:0,
       tot3:0,
       tot4:0,
       

      }},
      computed: {},
      methods: {
       
        handleClick(){
            this.active = !this.active;
     },

     rate1(){
        if(!this.active){
            this.a1 = 1,
            this.tot1 +=1
        }else{ this.a1=0, this.tot1 -=1}
     },
     
     handleClick2(){
        this.active2 = !this.active2;
 },
 rate2(){
    if(!this.active2){
        this.b1 = 1,
        this.tot1 +=1
    }else{ this.b1=0 , this.tot1 -=1}
 },
 
 handleClick3(){
    this.active3 = !this.active3;
},
rate3(){
if(!this.active3){
    this.c1 = 1,
    this.tot1 +=1
}else{ this.c1=0, this.tot1 -=1}
},

handleClick4(){
    this.active4 = !this.active4;
},
rate4(){
if(!this.active4){
    this.a2 = 1,
    this.tot2 +=1
}else{ this.a2=0, this.tot2 -=1}
},

handleClick5(){
    this.active5 = !this.active5;
},
rate5(){
if(!this.active5){
    this.b2 = 1,
    this.tot2 +=1
}else{ this.b2=0, this.tot2 -=1}
},

handleClick6(){
    this.active6 = !this.active6;
},
rate6(){
if(!this.active6){
    this.c2 = 1,
    this.tot2 +=1
}else{ this.c2=0, this.tot2 -=1}
},

handleClick7(){
    this.active7 = !this.active7;
},
rate7(){
if(!this.active7){
    this.a3 = 1,
    this.tot3 +=1
}else{ this.a3=0, this.tot3 -=1}
},

handleClick8(){
    this.active8 = !this.active8;
},
rate8(){
if(!this.active8){
    this.b3 = 1,
    this.tot3 +=1
}else{ this.b3=0, this.tot3 -=1}
},

handleClick9(){
    this.active9 = !this.active9;
},
rate9(){
if(!this.active9){
    this.c3 = 1,
    this.tot3 +=1
}else{ this.c3=0, this.tot3 -=1}
},

handleClick10(){
    this.active10 = !this.active10;
},
rate10(){
if(!this.active10){
    this.a4 = 1,
    this.tot4 +=1
}else{ this.a4=0, this.tot4 -=1}
},

handleClick11(){
    this.active11 = !this.active11;
},
rate11(){
if(!this.active11){
    this.b4 = 1,
    this.tot4 +=1
}else{ this.b4=0, this.tot4 -=1}
},

handleClick12(){
    this.active12 = !this.active12;
},
rate12(){
if(!this.active12){
    this.c4 = 1,
    this.tot4 +=1
}else{ this.c4=0, this.tot4 -=1}
},


    },

    watch:{

       

    }
    });
    app.mount('#app');