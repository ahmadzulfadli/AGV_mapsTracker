#include <Wire.h>
#include <ESP32WebServer.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BNO055.h>
#include <utility/imumaths.h>

// Define the webserver and set the port
ESP32WebServer server(80);

// Create an instance of the Adafruit BNO055 library
Adafruit_BNO055 bno = Adafruit_BNO055();

void setup() {
  // Initialize the serial communication
  Serial.begin(115200);
  while (!Serial);

  // Initialize the BNO055 sensor
  if (!bno.begin(Adafruit_BNO055::OPERATION_MODE_IMUPLUS)) {
    Serial.println("Ooops, no BNO055 detected ... Check your wiring or I2C ADDR!");
    while (1);
  }

  // Start the webserver
  server.begin();
  Serial.println("Server started");
}

void loop() {
  // Serve the client requests
  server.handleClient();

  // Get the current orientation of the robot
  imu::Vector<3> orientation = bno.getVector(Adafruit_BNO055::VECTOR_EULER);

  // Send the orientation data to the web page
  String output = "X: " + String(orientation.x()) + " Y: " + String(orientation.y()) + " Z: " + String(orientation.z());

  // Check if the client requests the orientation data
  if (server.hasArg("getData")) {
    server.send(200, "text/plain", output);
  }

  // Wait for some time to avoid overloading the system
  delay(500);
}
