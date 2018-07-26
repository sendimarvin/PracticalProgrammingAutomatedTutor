
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bt_in_class_autograder;

import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.bluetooth.DataElement;
import javax.bluetooth.DeviceClass;
import javax.bluetooth.DiscoveryAgent;
import javax.bluetooth.DiscoveryListener;
import javax.bluetooth.LocalDevice;
import javax.bluetooth.RemoteDevice;
import javax.bluetooth.ServiceRecord;
import javax.bluetooth.UUID;

/**
 *
 * @author Aiko
 */
class BTUtility extends Thread implements DiscoveryListener {
        
    
    public static void main(String[] args) {
        BTUtility c = new BTUtility();
        c.run();
    }
    
    static final UUID OBEX_FILE_TRANSFER = new UUID(0x1106);
    static final UUID APPLICATION_UUID = new UUID("0000110100001000800000805f9b34fb", false);
    
    
    ArrayList<RemoteDevice> remoteDevices;
    ArrayList<String> serviceFound;
        
    DiscoveryAgent discoveryAgent;
        
    // obviously, 0x1105 is the UUID for
    // the Object Push Profile
    UUID[] uuidSet = new UUID[] { new UUID(0x1105) ,  OBEX_FILE_TRANSFER, APPLICATION_UUID };
        
    // 0x0100 is the attrubute for the service name element in the service record
    int[] attrSet = {0x0100};
    
    final Object inquiryCompletedEvent = new Object();
    final Object serviceSearchCompletedEvent = new Object();
        
    @Override
    public void run(){   
        
        synchronized(inquiryCompletedEvent) {
            try {
                
                System.out.println("wait for device inquiry to complete...");
                inquiryCompletedEvent.wait();
                System.out.println(remoteDevices.size() +  " device(s) found");
                
            } catch (InterruptedException ex) {
                Logger.getLogger(BTUtility.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        
        try {
            
            for(int i = 0; i < remoteDevices.size(); i++){
                RemoteDevice remoteDevice = (RemoteDevice)remoteDevices.get(i);
                    
                synchronized(serviceSearchCompletedEvent) {
                    System.out.println("search services on " + remoteDevice.getBluetoothAddress() + " " + remoteDevice.getFriendlyName(false));
                    //LocalDevice.getLocalDevice().getDiscoveryAgent().searchServices(attrSet, uuidSet, remoteDevice, this);
                    discoveryAgent.searchServices(attrSet, uuidSet, remoteDevice , this);
                    serviceSearchCompletedEvent.wait();                
                }                
            }                
        } catch(Exception e) {
            System.out.println("error");
            e.printStackTrace();
        }
        
    }
        
    public BTUtility() {
            
        // clear the list out, just in case it's not
        remoteDevices = new ArrayList();
        serviceFound = new ArrayList();
            
        try {
            LocalDevice localDevice = LocalDevice.getLocalDevice();
            discoveryAgent = localDevice.getDiscoveryAgent();
            //deviceDiscoveryPanel.updateStatus(" Searching for Bluetooth devices in the vicinity...\n");
            discoveryAgent.startInquiry(DiscoveryAgent.GIAC, this);
                
        } catch(Exception e) {
            System.out.println("error");
            e.printStackTrace();
        }
        
    }
        
        
        
    @Override
    public void deviceDiscovered(RemoteDevice remoteDevice, DeviceClass cod) {
        
        String name;
        try{
            
            remoteDevices.add(remoteDevice);
            name = remoteDevice.getFriendlyName(false);
            
        } catch(Exception e){
            
            e.printStackTrace();
            name = remoteDevice.getBluetoothAddress();
            
        }
        
        System.out.println("device found: " + name);
            
    }
        
      
    @Override
    public void inquiryCompleted(int discType) {
        System.out.println("Device Inquiry completed!");
        synchronized(inquiryCompletedEvent){
            inquiryCompletedEvent.notifyAll();
        }   
            
    }
   
    
    @Override
    public void servicesDiscovered(int transID, ServiceRecord[] servRecord) {
        
        System.out.println(servRecord.length);
        
        for (int i = 0; i < servRecord.length; i++) {
            String url = servRecord[i].getConnectionURL(ServiceRecord.NOAUTHENTICATE_NOENCRYPT, false);
            if (url == null) {
                continue;
            }
            serviceFound.add(url);
            DataElement serviceName = servRecord[i].getAttributeValue(0x0100);
            if (serviceName != null) {
                System.out.println("service " + serviceName.getValue() + " found " + url);
            } else {
                System.out.println("service found " + url);
            }
        }
    }
        
    @Override
    public void serviceSearchCompleted(int transID, int respCode) {
            
        System.out.println("service search completed!");
        synchronized(serviceSearchCompletedEvent){
            serviceSearchCompletedEvent.notifyAll();
        }
        
        if (respCode == DiscoveryListener.SERVICE_SEARCH_COMPLETED) {
                
            // the service search process was successful
                
        } else {
                
            // the service search process has failed
            
        }
            
    }
        
}
