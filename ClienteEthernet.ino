#include <UIPEthernet.h>

#define VERDE 4
#define AZUL 5

#define EMPECUECADO 50
#define MUYRAPIDO   100
#define RAPIDO      200
#define NORMAL      500
#define LENTO       800
#define MUYLENTO    1200
#define RELENTO     2500

unsigned long tverde;  //timer led verde
unsigned long tazul;    //timer led rojo

boolean sactivo[6] = {1,1,0,0,0,1}; //Sensores activos

byte mac[] = { 0x54, 0x3A, 0xCC, 0x30, 0x30, 0x31 };                                       

EthernetClient client;
//EthernetServer server(80);
IPAddress ip(192,168,1,12); //IP arduino
char server[] = "192.168.50.116"; // IP servidor
unsigned long intermin = 1; // Intervalo de muestreo sensores (minutos)
unsigned long intersec = 1;

void setup() {
  pinMode(VERDE,OUTPUT);
  pinMode(AZUL,OUTPUT);
  digitalWrite(VERDE,HIGH);
  Serial.begin(9600);
  Serial.println("Cargando...");
  Ethernet.begin(mac);
  Serial.print("Direccion IP  : ");
  Serial.println(Ethernet.localIP());
  Serial.print("Mascara Subred: ");
  Serial.println(Ethernet.subnetMask());
  Serial.print("Puerta Enlace : ");
  Serial.println(Ethernet.gatewayIP());
  Serial.print("DNS ServerIP  : ");
  Serial.println(Ethernet.dnsServerIP());
  digitalWrite(VERDE,LOW);
  tverde = millis();
  tazul = millis();
}

void loop(){
  Serial.println("Conectando...");
  if(client.connect(server, 80)){
    digitalWrite(VERDE, HIGH);
    Serial.println("Conectado al servidor, enviando...");
    client.print("GET /arduino/arduino.php?");
    for(int i=0;i<=5;i++){
      if(sactivo[i]){
        int var = analogRead(i);
        Serial.print("Sensor: ");Serial.print(i);
        Serial.print("\t Valor: ");Serial.println(var);
        client.print("s");
        client.print(i);
        client.print("=");
        client.print(var);
        client.print("&");
      }
    }
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println(server);
    client.println("Connection: close");
    client.println();
    client.println();
    client.stop();
    Serial.println("Informacion enviada, desconectado.");
    digitalWrite(VERDE, LOW);
    //delaymin(intermin);
    delaysec(intersec);
  }
  else{
    Serial.println("Conexion fallida.");
    for(int s=5;s>=1;s--){
      Serial.print("Reconectando en ");
      Serial.print(s);
      Serial.println("seg...");
      delay(1000);
    }
  }
  
}

void delaymin(unsigned long _tiempo){
  unsigned long _auxt = millis()/60000;
  while((_auxt+_tiempo) > millis()/60000){
    parpadear(AZUL, RELENTO, &tazul);
  }
  digitalWrite(AZUL,LOW); //Apagar por si queda encendido
}
void delaysec(unsigned long _tiempo){
  unsigned long _auxt = millis()/1000;
  while((_auxt+_tiempo) > millis()/1000){
    parpadear(AZUL, LENTO, &tazul);
  }
  digitalWrite(AZUL,LOW); //Apagar por si queda encendido
}

void parpadear(int pin, int duracion, unsigned long *t){
  if(millis() > (*t+duracion)){
    digitalWrite(pin,!digitalRead(pin));
    *t = millis();
  }
}
