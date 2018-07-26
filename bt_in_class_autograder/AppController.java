/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bt_in_class_autograder;

import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ListView;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.VBox;
import javafx.stage.FileChooser;
import javafx.stage.Stage;

/**
 *
 * @author Aiko
 */
public class AppController implements Initializable {
    
    /*
    *
    * AccessType.fxml
    *
    */
    @FXML
    private Button student;
    
    @FXML
    private void onStudent(ActionEvent event) {
        System.out.println("onStudent");
        //show create assignment page
        mainApp.showStuHome();
        
    }
    
    @FXML
    private Button lecturer;
    
    @FXML
    private void onLecturer(ActionEvent event) {
        System.out.println("onLecturer");
        //show create assignment page
        mainApp.showLecHome();
        
    }
    
    
    /*
    *
    * LecHome.fxml
    *
    */
    @FXML
    private Button create;
    
    @FXML
    private void onCreate(ActionEvent event) {
        System.out.println("onCreate");
        //show create assignment page
        mainApp.showCreateAssignment();
        
    }
    
    @FXML
    private Button load;
    
    @FXML
    private void onLoad(ActionEvent event) {
        System.out.println("onLoad");
        boolean load = handleOpen();
        if(load){
        
            loadQuestions();
        
        }
        
    }
    
    @FXML
    private Button distribute;
    
    @FXML
    private void onDistribute(ActionEvent event) {
        System.out.println("onDistribute");
        if(networkId.getText().isEmpty()){
        
            handleAlert("Network ID not specified", "Please enter a network ID");
            return;
        
        }
        
    }
    
    @FXML
    private TextArea lechome;
    
    public void loadQuestions(){
    
        ArrayList<Question> questions = ApplicationManager.getQuestions();
        
        if(questions.isEmpty()){
        
            lechome.setText("No question file has been loaded");
        
        }else{
        
            String qns = "";
            for(int i = 0; i < questions.size(); i++){
                
                qns = qns.concat("Question ");
                qns = qns.concat(String.valueOf(i+1));
                qns = qns.concat(": ");
                
                Question q = questions.get(i);
 
                switch(q.getType()){
                
                    case 1:
                        
                        qns = qns.concat("[Structured Question]\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        
                        break;
                        
                    case 2:

                        qns = qns.concat("[Programming Question]\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        
                        break;
                        
                    case 3:
                        
                        ArrayList<String> options = q.getOpts();
                        qns = qns.concat("[Objective Question]\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        qns = qns.concat("Solution:\n");
                        qns = qns.concat(q.getSolution());
                        qns = qns.concat("\n\n");
                        qns = qns.concat("Options:\n");
                        for(int j = 0; j < options.size(); j++){
                        
                            qns = qns.concat(options.get(j));
                            qns = qns.concat("\n");
                        
                        }
                        qns = qns.concat("\n\n");
                        
                        break;
                
                }
                
            
            }
            
            lechome.setText(qns);
        
        }
    
    }
    
    @FXML
    private Label networkStatus;
    
    @FXML
    private TextField networkId;
    
    @FXML
    private TextArea createdTest;
    
    public TextArea getCreatedTest(){
    
            return createdTest;
    
    }
    
    
    /*
    *
    * LecCreateTest.fxml
    *
    */
    
    @FXML
    private Button loadAssgn;
    
    @FXML
    private void onLoadAssgn(ActionEvent event) {
        System.out.println("onLoadAssgn");
        handleOpen();
        
    }
    
    @FXML
    private Button saveAssgn;
    
    @FXML
    private void onSaveAssgn(ActionEvent event) {
        System.out.println("onSaveAssgn");
        handleSaveAs();
        
    }
    
    @FXML
    private Button addObjQn;
    
    @FXML
    private void onAddObjQn(ActionEvent event) {
        System.out.println("onAddObjQn");
        Boolean addedQn = mainApp.addObjQn();
        if(addedQn){
        
            mainApp.showAddedQuestions();
        
        }
        
    }
    
    @FXML
    private Button addStrQn;
    
    @FXML
    private void onAddStrQn(ActionEvent event) {
        System.out.println("onAddStrQn");
        Boolean addedQn = mainApp.addStrQn();
        if(addedQn){
        
            mainApp.showAddedQuestions();
        
        }
        
    }
    
    @FXML
    private Button addProQn;
    
    @FXML
    private void onAddProQn(ActionEvent event) {
        System.out.println("onAddProQn");
        Boolean addedQn = mainApp.addProQn();
        if(addedQn){
        
            mainApp.showAddedQuestions();
        
        }
        
    }
    
    @FXML
    private Button distAssgn;
    
    @FXML
    private void onDistAssgn(ActionEvent event) {
        System.out.println("onDistAssgn");
        handleSave();
        mainApp.showLecHome();
        
    }
    
    @FXML
    private Button back;
    
    @FXML 
    private void onBack(ActionEvent event){
    
        System.out.println("OnBack");
        mainApp.showLecHome();
    
    }
    
    @FXML
    private TextArea added;
    
    public void loadAddedQuestions(){
    
        ArrayList<Question> questions = ApplicationManager.getQuestions();
        
        if(questions.isEmpty()){
        
            added.setText("No question file has been loaded");
        
        }else{
        
            String qns = "";
            for(int i = 0; i < questions.size(); i++){
                
                qns = qns.concat("Question ");
                qns = qns.concat(String.valueOf(i+1));
                qns = qns.concat(": ");
                
                Question q = questions.get(i);
 
                switch(q.getType()){
                
                    case 1:
                        
                        qns = qns.concat("[Structured Question]\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        
                        break;
                        
                    case 2:
                        
                        qns = qns.concat("[Programming Question]\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        
                        break;
                        
                    case 3:
                        
                        ArrayList<String> options = q.getOpts();
                        qns = qns.concat("[Objective Question]\n");
                        qns = qns.concat(q.getQuestion());
                        qns = qns.concat("\n\n");
                        qns = qns.concat("Solution:\n");
                        qns = qns.concat(q.getSolution());
                        qns = qns.concat("\n\n");
                        qns = qns.concat("Options:\n");
                        for(int j = 0; j < options.size(); j++){
                        
                            qns = qns.concat(options.get(j));
                            qns = qns.concat("\n");
                        
                        }
                        qns = qns.concat("\n\n");
                        
                        break;
                
                }
                
            
            }
            
            added.setText(qns);
        
        }
    
    }
    
    /*
    *
    * StuHome.fxml
    *
    */
    
    @FXML
    private Button search;
    
    @FXML
    private ListView list;
    
    @FXML
    private void onSearch(ActionEvent event) {
        System.out.println("onSearch");
        
        Boolean loaded = handleOpen();
        if(loaded){
            
            AnchorPane page = mainApp.initStuStrQn();
            
            Node studentQues = page.lookup("qn");
            System.out.println(studentQues.getAccessibleText());
            
            page.getChildren();
            
            ArrayList<Question> questions = ApplicationManager.getQuestions();
            if(questions.isEmpty()){
        
                studentQuestion.setText("No question file has been loaded");
        
            }else{
        
                for(int i = 0; i < questions.size(); i++){
        
                    Question q = questions.get(i);
                    QuestionDisplay disp = new QuestionDisplay(String.valueOf(i));
                
                    switch(q.getType()){
                
                        case 1:
                        
                            studentQuestion.setText(q.getQuestion());
                            list.getItems().add(disp);
                        
                        
                            break;
                        
                        case 2:
                        
                            studentQuestion.setText(q.getQuestion());
                            list.getItems().add(disp);
                        
                            break;
                        
                        case 3:
                        
                        
                        
                            break;
                        
                    }
                
                }
            
            }
        
        }
        
    }
    
    @FXML
    private Label studentQuestion;
    
    @FXML
    private TextArea studentAnswer;
    
    @FXML
    private VBox studentqns;
    
    
    public void showStrQuestion(Question q, AnchorPane ap){
    
        
    
    }
    
    @FXML
    private Button submit;
    
    @FXML
    private void onSubmit(ActionEvent event) {
        System.out.println("onSubmit");
        if(networkId.getText().isEmpty()){
        
            //show enter network id prompt
        
        }
        
    }
    
    @FXML
    private Label stuNetworkStatus;
    
    @FXML
    private TextField stuNetworkId;
    
    @FXML
    private TextField regNum;
    
    /*
    *
    * NetworkID.fxml
    *
    */
    
    @FXML
    private TextField promptNetworkId;
    
    @FXML
    private Button submitNetworkId;
    
    @FXML
    private void onSubmitNetId(ActionEvent event) {
        System.out.println("onSubmit");
        if(networkId.getText().isEmpty()){
        
            //show enter network id prompt
        
        }
        
    }
    
    /*
    *
    * Objective.fxml
    *
    */
    
    @FXML
    private TextArea objQn;
    
    @FXML
    private TextField objA;
    
    @FXML
    private TextField objB;
    
    @FXML
    private TextField objC;
    
    @FXML
    private TextField objD;
    
    @FXML
    private TextField objE;
    
    @FXML
    private TextField objF;
    
    @FXML
    private TextField objAns;
    
    @FXML
    private Button submitObj;
    
    @FXML
    private Button cancelObj;
    
    @FXML
    private void onSubmitObj(ActionEvent event) {
        System.out.println("onSubmitObj");
        
        String question = (String)objQn.getText();
        String optionA = "A. ";
        optionA = optionA.concat((String)objA.getText());
        String optionB = "B. ";
        optionB = optionB.concat((String)objB.getText());
        String optionC = "C. ";
        optionC = optionC.concat((String)objC.getText());
        String optionD = "D. ";
        optionD = optionD.concat((String)objD.getText());
        String optionE = "E. ";
        optionE = optionE.concat((String)objE.getText());
        String optionF = "F. ";
        optionF = optionF.concat((String)objF.getText());
        String optionAns = (String)objAns.getText();
        
        if(question.isEmpty()){
        
            handleAlert("Empty Question", "Please add a question before submitting");
        
        }else if(optionA.matches("A. ") || optionB.matches("B. ") || optionC.matches("C. ") || optionD.matches("D. ")){
        
            handleAlert("Empty Options", "Please add at least 4 objective options before submitting");
        
        }else{
        
            Question qn = new Question(question, 3);
            qn.setSolution(optionAns);
            qn.setOptions(optionA, optionB, optionC, optionD, optionE, optionF);
            ApplicationManager.getQuestions().add(qn);
            setObjBool();
                    
            dialogStage.close();
        
        }
  
    }
    
    @FXML
    private void onCancelObj(ActionEvent event) {
        System.out.println("onCancelObj");
        dialogStage.close();
        
    }
    
    /*
    *
    * ProgrammingQuestion.fxml
    *
    */
    
    @FXML
    private TextArea proQn;
    
    @FXML
    private TextArea proQnSample;
    
    @FXML
    private Button submitPro;
    
    @FXML
    private Button cancelPro;
    
    @FXML
    private void onSubmitPro(ActionEvent event) {
        System.out.println("onSubmitPro");
        
        String programmingQn = (String) proQn.getText();
        if(programmingQn.isEmpty()){
      
            handleAlert("Empty Question", "Please add a question before submitting");
         
        }else{
        
            Question pqn = new Question(programmingQn, 2);
            pqn.setSampleCode("");
            ApplicationManager.getQuestions().add(pqn);
            setProBool();
            dialogStage.close();
        
        }
  
    }
    
    @FXML
    private void onCancelPro(ActionEvent event) {
        System.out.println("onCancelPro");
        dialogStage.close();
        
    }
    
    /*
    *
    * StructuredQuestion.fxml
    *
    */
    
    @FXML
    private TextArea strQns;
    
    @FXML
    private Button submitStr;
    
    @FXML
    private Button cancelStr;
    
    @FXML
    private void onSubmitStr(ActionEvent event) {
        System.out.println("onSubmitStr");
        
        String structuredQn = (String) strQns.getText();
        if(structuredQn.isEmpty()){
      
            handleAlert("Empty Question", "Please add a question before submitting");
         
        }else{
        
            Question sqn = new Question(structuredQn, 1);
            ApplicationManager.getQuestions().add(sqn);
            setStrBool();
            dialogStage.close();
        
        }
        
    }
    
     @FXML
    private void onCancelStr(ActionEvent event) {
        System.out.println("onCancelStr");
        dialogStage.close();
        
    }
    
    /*
    *
    * Rest of the code
    *
    */
    
    private BT_In_Class_Autograder mainApp;
    private Stage dialogStage;
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }

    public void setMainApp(BT_In_Class_Autograder mainApp) {
        
        this.mainApp = mainApp;
       
    } 
    
    /**
     * Sets the stage of this dialog.
     * 
     * @param dialogStage
     */
    public void setDialogStage(Stage dialogStage) {
        this.dialogStage = dialogStage;
    }
    
    /*
    public AppController(BT_In_Class_Autograder mainApp) {
        
        this.mainApp = mainApp;
       
    }
    */
    
    private boolean isSubmitStr,isSubmitPro, isSubmitObj;
    
    public void resetStrBool(){ isSubmitStr = false; }
    
    public void resetProBool(){ isSubmitPro = false; }
    
    public void resetObjBool(){ isSubmitObj = false; }
    
    public void setObjBool(){ isSubmitObj = true; }
    
    public void setProBool(){ isSubmitPro = true; }
    
    public void setStrBool(){ isSubmitStr = true; }

    public boolean isSubmitStrClicked() { return isSubmitStr; }
    
    public boolean isSubmitProClicked() { return isSubmitPro; }
    
    public boolean isSubmitObjClicked() { return isSubmitObj; }
    
    /**
     * Creates an empty question file.
     */
    @FXML
    private void handleNew() {
        
        ApplicationManager.setQuestions(new ArrayList<Question>());
        mainApp.setQuestionsFilePath(null);
        
    }

    /**
     * Opens a FileChooser to let the user select a questions file to load.
     */
    @FXML
    private Boolean handleOpen() {
        FileChooser fileChooser = new FileChooser();

        // Set extension filter
        FileChooser.ExtensionFilter extFilter = new FileChooser.ExtensionFilter("XML files (*.xml)", "*.xml");
        fileChooser.getExtensionFilters().add(extFilter);

        // Show open file dialog
        File file = fileChooser.showOpenDialog(mainApp.getPrimaryStage());

        if (file != null) {
            mainApp.loadQuestionsFromFile(file);
            return true;
        }
        
        return false;
        
    }

    /**
     * Saves the file to the questions file that is currently open. If there is no
     * open file, the "save as" dialog is shown.
     */
    @FXML
    private void handleSave() {
        File questionFile = mainApp.getQuestionFilePath();
        if (questionFile != null) {
            mainApp.saveQuestionsToFile(questionFile);
        } else {
            handleSaveAs();
        }
    }

    /**
     * Opens a FileChooser to let the user select a file to save to.
     */
    @FXML
    private void handleSaveAs() {
        FileChooser fileChooser = new FileChooser();

        // Set extension filter
        FileChooser.ExtensionFilter extFilter = new FileChooser.ExtensionFilter("XML files (*.xml)", "*.xml");
        fileChooser.getExtensionFilters().add(extFilter);

        // Show save file dialog
        File file = fileChooser.showSaveDialog(mainApp.getPrimaryStage());

        if (file != null) {
            // Make sure it has the correct extension
            if (!file.getPath().endsWith(".xml")) {
                file = new File(file.getPath() + ".xml");
            }
            mainApp.saveQuestionsToFile(file);
        }
        
    }

    /**
     * Opens an about dialog.
     */
    @FXML
    private void handleAlert(String header, String text) {
        
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("Bluetooth Application");
        alert.setHeaderText(header);
        alert.setContentText(text);

        alert.showAndWait();
    
    }

    /**
     * Closes the application.
     */
    @FXML
    private void handleExit() {
        System.exit(0);
    }
    
    public class QuestionDisplay extends AnchorPane{
    
        public QuestionDisplay(String id){
    
            FXMLLoader loader = new FXMLLoader(getClass().getResource("question.fxml"));
            loader.setRoot(this);
            loader.setController(loader.getController());
            
            this.setId(id);
        
            try{
        
                loader.load();
        
            }catch(IOException e){}
    
        }
    
    }

}
