//SDA -> D4
//SCK -> D5
//MOSI -> D7
//MISO -> D6

//BUZZER -> D0

//LCD SCL -> D1
//LCD SDA -> D2

//GREENLED -> D3
//REDLED -> D8



#include<SoftwareSerial.h>
#include <LiquidCrystal_I2C.h>
#include <Wire.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
#include <SPI.h>
#include <MFRC522.h>

const char* ssid = "Will the wise";// 
const char* password = "Tangojuliet1996";
//WiFiClient client;
char server[] = "35.244.50.5";   //eg: 192.168.0.222
#define SS_PIN 2 //FOR RFID SS PIN BECASUSE WE ARE USING BOTH ETHERNET SHIELD AND RS-522
#define RST_PIN 15
#define No_Of_Card 3
#define BUZZER D0
#define GREENLIGHT D3 
#define REDLIGHT D8

WiFiClient client;
LiquidCrystal_I2C lcd(0x27, 16, 2);

//WiFiServer server(80);
SoftwareSerial mySerial(8,9);     
MFRC522 rfid(SS_PIN,RST_PIN);
MFRC522::MIFARE_Key key; 
byte id[No_Of_Card][4]={
  {17,1,215,43},             //RFID NO-1
  {112,224,72,84},             //RFID NO-2
  {151,94,80,84}              //RFID NO-3
};
byte id_temp[3][3];
byte i;
int j=0;
void setup(){
  Wire.begin(D2, D1);
  lcd.begin();
  lcd.home();
  pinMode(BUZZER, OUTPUT);
  pinMode(GREENLIGHT, OUTPUT);
  pinMode(REDLIGHT, OUTPUT);

  digitalWrite(GREENLIGHT,LOW);
  digitalWrite(REDLIGHT,LOW);
  
  Serial.begin(115200);
  delay(10);
  mySerial.begin(115200);
  SPI.begin();
  rfid.PCD_Init();

    for(byte i=0;i<6;i++){
    key.keyByte[i]=0xFF;
  }

  // Connect to WiFi network
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
 
  WiFi.begin(ssid, password);
  //lcd.print("System Booting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
  //lcd.clear();
 
  // Start the server
//  server.begin();
  Serial.println("Server started");
  Serial.print(WiFi.localIP());
  delay(1000);
  Serial.println("connecting...");
 }
void loop(){  
  // Check if a client has connected
  int m=0;
  if(!rfid.PICC_IsNewCardPresent())
  return;
  if(!rfid.PICC_ReadCardSerial())
  return;
  for(i=0;i<4;i++){
   id_temp[0][i]=rfid.uid.uidByte[i]; 
   delay(50);
  }
  
   for(i=0;i<No_Of_Card;i++){
          if(id[i][0]==id_temp[0][0]){
            if(id[i][1]==id_temp[0][1]){
              if(id[i][2]==id_temp[0][2]){
                if(id[i][3]==id_temp[0][3]){
                  Serial.print("your card no :");
                  for(int s=0;s<4;s++){
                    Serial.print(rfid.uid.uidByte[s]);
                    Serial.print(" ");
                   
                  }
                  Serial.println("\nVALID");
                  //digitalWrite(BUZZER, HIGH);
                  tone(BUZZER,HIGH,1000);
                  tone(GREENLIGHT,HIGH,1000);
                  lcd.clear();
                  lcd.print("Hello, Calculus!");
                  Sending_To_DB();
                  j=0;
                            
                            rfid.PICC_HaltA(); rfid.PCD_StopCrypto1();   return; 
                }
              }
            }
          }else{
            j++;
            if(j==No_Of_Card){
              Serial.println("inVALID");
              tone(BUZZER,100,1000);
              tone(REDLIGHT,HIGH,1000);
              lcd.clear();
              lcd.print("Invalid ID!");
              Sending_To_DB();
              j=0;
            }
           }
          }
  
  // Halt PICC
  rfid.PICC_HaltA();

  // Stop encryption on PCD
  rfid.PCD_StopCrypto1();
 }

 void Sending_To_DB(){
  //CONNECTING WITH MYSQL
   if (client.connect(server, 80)){
    Serial.println("connected");
    // Make a HTTP request:
    String url = "/RFIDSystem/get.php?";
    if(j!=No_Of_Card){
      Serial.println('1');
      url+= "allow=1";
    }else{
      Serial.println('0');
      url+= "allow=0";
    }
    Serial.println("&id=");
    url+= "&id=";
    for(int s=0;s<4;s++){
        Serial.println(rfid.uid.uidByte[s]);
        url+= (rfid.uid.uidByte[s]);
    }

    // This will send the request to the server
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + server + "\r\n" + 
                 "Connection: close\r\n\r\n");    
    
  }else{
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  client.stop();
 }
