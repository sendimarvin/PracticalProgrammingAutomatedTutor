/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bt_in_class_autograder;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.util.ArrayList;
import java.util.prefs.Preferences;
import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.BorderPane;
import javafx.stage.Modality;
import javafx.stage.Stage;
import javax.xml.bind.JAXBContext;
import javax.xml.bind.Marshaller;
import javax.xml.bind.Unmarshaller;

/**
 *
 * @author Aiko
 */
public class BT_In_Class_Autograder extends Application {
    
    private Stage primaryStage;
    private BorderPane rootLayout;
    private AnchorPane accessLayout;
    private AnchorPane strqn;
    private AnchorPane objqn;
    
    private AppController controller;
    
    private TextArea lecHome;
    
    @Override
    public void start(Stage stage) throws Exception {
        
        primaryStage = stage;
        primaryStage.setTitle("In-Class Assignment Autograder");
        
        selectAccess();
      
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
    /**
     * Initializes the select access.
     */
    public void selectAccess() {
        try {
            // Load root layout from fxml file.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("AccessType.fxml"));
            accessLayout = (AnchorPane) loader.load();
            
            controller = loader.getController();
            controller.setMainApp(this);
            
            ApplicationManager.setQuestions(new ArrayList());

            // Show the scene containing the root layout.
            Scene scene = new Scene(accessLayout);
            primaryStage.setScene(scene);
            primaryStage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    
    /**
     * Initializes the root layout.
     */
    public void initRootLayout() {
        
        try {
            // Load root layout from fxml file.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("RootLayout.fxml"));
            rootLayout = (BorderPane) loader.load();

            // Show the scene containing the root layout.
            Scene scene = new Scene(rootLayout);
            primaryStage.setScene(scene);
        } catch (IOException e) {
            e.printStackTrace();
        }
        
    }
    
    /**
     * Shows the lecturer home page inside the root layout.
     */
    public void showLecHome() {
        
        initRootLayout();
        
        try {
            // Load person overview.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("LecturerHome.fxml"));
            AnchorPane lecturerHome = (AnchorPane) loader.load();
            
            controller = loader.getController();
            controller.setMainApp(this);
            
            controller.loadQuestions();

            // Set person overview into the center of root layout.
            rootLayout.setCenter(lecturerHome);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    
    /**
     * Shows the student home page inside the root layout.
     */
    public void showStuHome() {
        
        initRootLayout();
                
        try {
            // Load person overview.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("StuHome.fxml"));
            AnchorPane stuHome = (AnchorPane) loader.load();
            
            
            controller = loader.getController();
            controller.setMainApp(this);

            // Set person overview into the center of root layout.
            rootLayout.setCenter(stuHome);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    
    /**
     * Shows the create assignment page inside the root layout.
     */
    public void showCreateAssignment() {
        
        initRootLayout();
        
        try {
            // Load person overview.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("LecCreateTest.fxml"));
            AnchorPane createAssgn = (AnchorPane) loader.load();
            
            controller = loader.getController();
            controller.setMainApp(this);
            
            lecHome = controller.getCreatedTest();

            // Set person overview into the center of root layout.
            rootLayout.setCenter(createAssgn);
            
            
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    
    /**
     * Shows the student home page inside the root layout.
     */
    public AnchorPane initStuStrQn() {
                
        try {
            // Load person overview.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("question.fxml"));
            strqn = (AnchorPane) loader.load();

        } catch (IOException e) {
            e.printStackTrace();
        }
        
        return strqn;
        
    }
    
    public void showAddedQuestions(){
    
        /*
        // Load person overview.
        FXMLLoader loader = new FXMLLoader();
        loader.setLocation(BT_In_Class_Autograder.class.getResource("LecCreateTest.fxml"));
            
        controller = loader.getController();
        controller.setMainApp(this);
        */
        
        showCreateAssignment();
        controller.loadAddedQuestions();
            
    }
    
    /*
    public void showSavedTest(){
    
        ArrayList<Question> questions = ApplicationManager.getQuestions();
        
        if(questions.isEmpty()){
        
            lecHome.setText("No question file has been loaded");
        
        }else{
        
            String qns = "";
            
            for(int i = 0; i < questions.size(); i++){
                
                qns = qns.concat(String.valueOf(i + 1));
                qns = qns.concat("\n");
                
                Question q = questions.get(i);
                qns = qns.concat(q.getQuestion());
                qns = qns.concat("\n\n");
                
            }
            
            lecHome.setText(qns);
        
        }
    
    }
    */
    
    public void showCreatedTest(){
    
        ArrayList<Question> questions = ApplicationManager.getQuestions();
        
        if(questions.isEmpty()){
        
            lecHome.setText("No question file has been loaded");
        
        }else{
        
            String qns = "";
            for(int i = 0; i < questions.size(); i++){
                
                qns = qns.concat(String.valueOf(i+1));
                qns = qns.concat("\n");
                
                Question q = questions.get(i);
 
                switch(q.getType()){
                
                    case 1:
                        
                        qns = qns.concat("Structured Question\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        
                        break;
                        
                    case 2:
                        
                        qns = qns.concat("Programming Question\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        
                        break;
                        
                    case 3:
                        
                        ArrayList<String> options = q.getOpts();
                        qns = qns.concat("Structured Question\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        qns = qns.concat("Solution:\n");
                        qns = qns.concat(q.getSolution());
                        qns = qns.concat("\n\n");
                        qns = qns.concat("Options:\n");
                        for(int j = 0; j < options.size(); j++){
                        
                            qns.concat(options.get(j));
                            qns.concat("\n");
                        
                        }
                        qns = qns.concat("\n\n");
                        
                        break;
                
                }
                
            
            }
            
            lecHome.setText(qns);
        
        }
    
    }
    
    public void showConnectionDetails(String conn_details){
    
        
    
    }
    
    public boolean addObjQn(){
    
        try {
            // Load person overview.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("ObjectiveQuestion.fxml"));
            AnchorPane addObjQn = (AnchorPane) loader.load();
            
             // Create the dialog Stage.
            Stage dialogStage = new Stage();
            dialogStage.setTitle("Add Objective Question");
            dialogStage.initModality(Modality.WINDOW_MODAL);
            dialogStage.initOwner(primaryStage);
            Scene scene = new Scene(addObjQn);
            dialogStage.setScene(scene);
            
            controller = loader.getController();
            controller.setMainApp(this);
            controller.setDialogStage(dialogStage);
            controller.resetObjBool();
            
            // Show the dialog and wait until the user closes it
            dialogStage.showAndWait();
            
            return controller.isSubmitObjClicked();
            
        } catch (IOException e) {
            e.printStackTrace();
            return false;
        }
    
    }
    
    public boolean addProQn(){
    
        try {
            // Load person overview.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("ProgrammingQuestion.fxml"));
            AnchorPane addProQn = (AnchorPane) loader.load();
            
            // Create the dialog Stage.
            Stage dialogStage = new Stage();
            dialogStage.setTitle("Add Programming Question");
            dialogStage.initModality(Modality.WINDOW_MODAL);
            dialogStage.initOwner(primaryStage);
            Scene scene = new Scene(addProQn);
            dialogStage.setScene(scene);
            
            controller = loader.getController();
            controller.setMainApp(this);
            controller.setDialogStage(dialogStage);
            controller.resetProBool();
            
            // Show the dialog and wait until the user closes it
            dialogStage.showAndWait();
            
            return controller.isSubmitProClicked();
        
        } catch (IOException e) {
            e.printStackTrace();
            return false;
        }
    
    }
    
    public boolean addStrQn(){
    
        try {
            // Load person overview.
            FXMLLoader loader = new FXMLLoader();
            loader.setLocation(BT_In_Class_Autograder.class.getResource("StructuredQuestion.fxml"));
            AnchorPane addStrQn = (AnchorPane) loader.load();
            
             // Create the dialog Stage.
            Stage dialogStage = new Stage();
            dialogStage.setTitle("Add Structured Question");
            dialogStage.initModality(Modality.WINDOW_MODAL);
            dialogStage.initOwner(primaryStage);
            Scene scene = new Scene(addStrQn);
            dialogStage.setScene(scene);
            
            controller = loader.getController();
            controller.setMainApp(this);
            controller.setDialogStage(dialogStage);
            controller.resetStrBool();
            
            // Show the dialog and wait until the user closes it
            dialogStage.showAndWait();
            
            return controller.isSubmitStrClicked();
            
        } catch (IOException e) {
            e.printStackTrace();
            return false;
        }
    
    }
    
    public void loadQuestionsFromFile(File file){
    
        try {

            QuestionsWrapper.setQns(file.getPath());

            // Save the file path to the registry.
            setQuestionsFilePath(file);

        } catch (Exception e) { 

            // catches ANY exception
            Alert alert = new Alert(AlertType.ERROR);
            alert.setTitle("Error");
            alert.setHeaderText("Could not load data");
            alert.setContentText("Could not load data from file:\n" + file.getPath());

            alert.showAndWait();
        }
    }
    
    /**
 * Saves the current person data to the specified file.
 * 
 * @param file
 */
    public void saveQuestionsToFile(File file) {
        
        try {
            
            FileOutputStream outputStream = new FileOutputStream(file);
            OutputStreamWriter outputStreamWriter = new OutputStreamWriter(outputStream);
            BufferedWriter bufferedWriter = new BufferedWriter(outputStreamWriter);
            
            String xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><questions>";
            
            ArrayList<Question> qns = ApplicationManager.getQuestions();
            for(int i = 0; i < qns.size(); i++){
            
                xml = xml.concat(qns.get(i).getXml());
            
            }
            
            xml = xml.concat("</questions>");
            
            bufferedWriter.write(xml);
             
            bufferedWriter.close();

            // Save the file path to the registry.
            setQuestionsFilePath(file);
            
        } catch (Exception e) { // catches ANY exception
            
            Alert alert = new Alert(AlertType.ERROR);
            alert.setTitle("Error");
            alert.setHeaderText("Could not save data");
            alert.setContentText("Could not save data to file:\n" + file.getPath());

            alert.showAndWait();
        }
    }
    
    /**
     * Sets the file path of the currently loaded file. The path is persisted in
     * the OS specific registry.
     * 
    * @param file the file or null to remove the path
    */
    public void setQuestionsFilePath(File file) {
        Preferences prefs = Preferences.userNodeForPackage(BT_In_Class_Autograder.class);
        if (file != null) {
            
            prefs.put("filePath", file.getPath());

            // Update the stage title.
            primaryStage.setTitle("Bluetooth Application - " + file.getName());
        
        } else {
            
            prefs.remove("filePath");

            // Update the stage title.
            primaryStage.setTitle("Bluetooth Application");
        }
    }
    
    /**
     * Returns the person file preference, i.e. the file that was last opened.
     * The preference is read from the OS specific registry. If no such
     * preference can be found, null is returned.
     * 
    * @return
    */
    public File getQuestionFilePath() {
        
        Preferences prefs = Preferences.userNodeForPackage(BT_In_Class_Autograder.class);
        String filePath = prefs.get("filePath", null);
        if (filePath != null) {
            return new File(filePath);
        } else {
            return null;
        }
    }
    
    public Stage getPrimaryStage(){
    
        return primaryStage;
    
    }
}
