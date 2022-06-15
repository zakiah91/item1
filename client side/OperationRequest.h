#ifndef OperationRequest_H
#define OperationRequest_H

#include <string>
#include <iostream>
#include <fstream>
#include <stdlib.h>
#include <stdio.h>
#include "C:/msys64/mingw64/include/curl/curl.h"


class OperationRequest{

    private:
        //std::string date;
        //std::string task;
        //std::string isDone;
        std::string userId;
        std::string url;

    public:
        void setUserId();
        std::string getUserId();
        void setPostUrl(std::string param_url);
        std::string getPostUrl();
        std::string sendPostRequest(std::string param_postData);
        std::string getToDoListBasedOnDate(std::string param_opCode,std::string param_date);
        std::string getToDoListBasedIsDoneStatus(std::string param_opCode,std::string param_isDone);
        std::string createNewToDoList(std::string param_opCode,std::string param_date,std::string param_task,std::string param_isDone);
        std::string deleteToDoListBasedOnDate(std::string param_opCode,std::string param_date);
        std::string setToDoListForisDoneStatusToYesBasedOnDateANDTask(std::string param_opCode,std::string param_date,std::string param_task);
};

#endif