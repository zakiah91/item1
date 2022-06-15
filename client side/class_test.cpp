//#include <iostream>
//#include <string>
#include "OperationRequest.h"

//using namespace std;

int main(){
    std::cout<<"******* created by zakiah 13062022 *********"<<std::endl;
    
    OperationRequest opReq;

    bool isUsrReqStop = false;
    std::string op ="";
    std::string usrInput;


    while(isUsrReqStop == false){
 
        if(op == "1"){ 
            opReq.setUserId();
        }         
        else if( op == "2"){
            std::cout<<opReq.getUserId()<<std::endl;
        }
        else if( op == "3"){
            std::cout<<"Please insert url to below"<<std::endl;
            std::cout<<"Press 3 if you want to use this url: http://localhost/mywampvirtualhost/googleSignIn/requestOperations.php" <<std::endl ;
            std::cin>>usrInput;
            if(usrInput == "3"){
                usrInput = "http://localhost/mywampvirtualhost/googleSignIn/requestOperations.php";
            }else{
                std::cout<<"Your url =";
                std::cin>>usrInput;
                std::cout<<""<<std::endl;
            }
            opReq.setPostUrl(usrInput);
        }else if(op == "4"){
            std::cout<<opReq.getPostUrl()<<std::endl;
        }else if(op == "5"){
            std::cout<<"press 5 for value inserted = opReq.getToDoListBasedOnDate(\"5\",\"2022-06-12\")"<<std::endl;
            std::cin>>usrInput;
            if(usrInput == "5"){
                opReq.getToDoListBasedOnDate("5","2022-06-12");
            }else{
                std::cout<<" Date (YYYY-MM-DD)=";std::cin>>usrInput; std::cout<<""<<std::endl;
                opReq.getToDoListBasedOnDate("5",usrInput);
            }
        }
        else if(op=="6"){
            std::cout<<"press 6 for value inserted = opReq.getToDoListBasedIsDoneStatus(\"6\",\"YES\")" <<std::endl;
            std::cin>>usrInput;
            if(usrInput == "6"){
                opReq.getToDoListBasedIsDoneStatus("6","YES");
            }else{
                std::cout<<" isDone status (YES/NO)=";std::cin>>usrInput; std::cout<<""<<std::endl;
                opReq.getToDoListBasedIsDoneStatus("6",usrInput);
            }
        }else if(op=="7"){
            std::cout<<"press 7 ror value inserted = opReq.createNewToDoList(\"7\",\"2022-06-14\",\"Gidi up!\",\"NO\")"<<std::endl;
            std::cin>>usrInput;
            if(usrInput == "7"){
                opReq.createNewToDoList("7","2022-06-14","Gidi up!","NO");
            }else{
                std::string usrTask;
                std::string date;
                std::string isDoneStatus;
                std::cout<<" date (YYYY-MM-DD)=";std::cin>>date; std::cout<<""<<std::endl;
                std::cout<<" Task (string values)=";std::cin>>usrTask;std::cout<<""<<std::endl; 
                std::cout<<" isDone status (YES/NO)=";std::cin>>isDoneStatus; std::cout<<""<<std::endl;
                opReq.createNewToDoList("7",date,usrTask,isDoneStatus);
            }

        }else if(op == "8"){
            std::cout<<"press 8 for value inserted = opReq.deleteToDoListBasedOnDate(\"8\",\"2022-06-14\") "<<std::endl;
            std::cin>>usrInput;
            if(usrInput == "8"){
                opReq.deleteToDoListBasedOnDate("8","2022-06-14");
            }else{
                std::cout<<" date (YYYY-MM-DD)=";std::cin>>usrInput; std::cout<<""<<std::endl;
                opReq.deleteToDoListBasedOnDate("8",usrInput);
            }
        }else if(op == "9"){
            std::cout<<"press 9 for value inserted = opReq.setToDoListForisDoneStatusToYesBasedOnDateANDTask(\"9\",\"2022-06-14\",\"Gidi up!\") "<<std::endl;
                        std::cin>>usrInput;
            if(usrInput == "9"){
                opReq.setToDoListForisDoneStatusToYesBasedOnDateANDTask("9","2022-06-14","Gidi up!");
            }else{
                std::string date;
                std::string usrTask;
                std::cout<<" date (YYYY-MM-DD)=";std::cin>>date; std::cout<<""<<std::endl;
                std::cout<<" Task (string values)=";std::cin>>usrTask;std::cout<<""<<std::endl; 
                opReq.setToDoListForisDoneStatusToYesBasedOnDateANDTask("9",date,usrTask);
            }
        }
        
        std::cout<<"Please put in the operation that you want to test"<<std::endl
        <<"To stop, please write 'stop'"<<std::endl
        <<"1. setUserId()"<<std::endl
        <<"2. getUserId()"<<std::endl
        <<"3. setPostUrl(std::string param_url)"<<std::endl
        <<"4. getPOstUrl()"<<std::endl
        <<"5. getToDoListBasedOnDate(std::string param_opCode,std::string param_date)"<<std::endl
        <<"6. getToDoListBasedIsDoneStatus(std::string param_opCode,std::string param_isDone)" <<std::endl  
        <<"7. createNewToDoList(std::string param_opCode,std::string param_date,std::string param_task,std::string param_isDone)" << std::endl
        <<"8. deleteToDoListBasedOnDate(std::string param_opCode,std::string param_date)" <<std::endl
        <<"9. setToDoListForisDoneStatusToYesBasedOnDateANDTask(std::string param_opCode,std::string param_date,std::string param_task)"<<std::endl;
        std::cin>> op;
        if(op == "stop"){
            isUsrReqStop = true;
        }
    }


    return 0;
}