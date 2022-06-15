#include "OperationRequest.h"

//zakiah13062022: start

//get the userId from the text file
//1. open text file and get userId
//2. assign the value to the private user id
void OperationRequest::setUserId(){

    std::cout<<"zakiah at setUserId"<<std::endl;
    std::ifstream fileStream ("toDoListUserId.txt");
    std::string lineValue;
    if(fileStream.is_open()){
        getline(fileStream,userId);
    }
    fileStream.close();
    std::cout<<"userId="<<userId<<std::endl;

}


static size_t WriteCallback(void *contents, size_t size, size_t nmemb, void *userp){

	((std::string*)userp)->append((char*)contents, size * nmemb);
	return size*nmemb;

}


std::string OperationRequest::sendPostRequest(std::string param_postData){

    CURL *curl;
	CURLcode curlCode;
	std::string readBufferStr;
	


	//for handling winsock
	curl_global_init(CURL_GLOBAL_ALL);

	//to get a curl handle
	curl = curl_easy_init();

    std::cout<<"zakiah AT sendPostRequest postData= "+param_postData<<std::endl;
	
	if(curl){ //this will convert not null pointer to true
		//set the url
		curl_easy_setopt(curl, CURLOPT_URL,url.c_str());

		//set the post value
		curl_easy_setopt(curl,CURLOPT_POSTFIELDS,param_postData.c_str());

		curl_easy_setopt(curl,CURLOPT_WRITEFUNCTION, WriteCallback );

		curl_easy_setopt(curl,CURLOPT_WRITEDATA, &readBufferStr);

		//perform the request
		curlCode = curl_easy_perform(curl);

		if(curlCode != CURLE_OK){
			std::cout<<"zakiah curl_easy_perform() failed : "<<curl_easy_strerror(curlCode)<<std::endl;
		}

		curl_easy_cleanup(curl);

		std::cout<<readBufferStr<<std::endl;
	}

	curl_global_cleanup();

    return readBufferStr;

}

std::string OperationRequest::getToDoListBasedOnDate(std::string param_opCode,std::string param_date){

    //display data
    std::string str = "zakiah getToDoListBasedOnDate";

    std::cout<<str<<std::endl;
    std::string post_value = "usrId="+userId+"&opCode="+param_opCode+"&usrDate="+param_date;
	std::cout<<"zakiah post_value = "+post_value<<std::endl;
	str=sendPostRequest(post_value);
    return str;

}

void OperationRequest::setPostUrl(std::string param_url){
    
    url=param_url;
    std::cout<<"zakiah AT setPostUrl = "<<url<<std::endl;

}

std::string OperationRequest::getPostUrl(){

    std::cout<<"zakiah AT getPostUrl"<<std::endl;
    return url;

}

std::string OperationRequest::getUserId(){

	std::cout<<"zakiah AT getUserId"<<std::endl;
	return userId;

}

std::string OperationRequest::getToDoListBasedIsDoneStatus(std::string param_opCode,std::string param_isDone){
	//display data
    std::string str = "zakiah getToDoListBasedIsDoneStatus";

    std::cout<<str<<std::endl;
    std::string post_value = "usrId="+userId+"&opCode="+param_opCode+"&usrIsDone="+param_isDone;
	std::cout<<"zakiah post_value = "+post_value<<std::endl;
	str=sendPostRequest(post_value);
    return str;
}

std::string OperationRequest::createNewToDoList(std::string param_opCode,std::string param_date,std::string param_task,std::string param_isDone){

    std::string str = "zakiah createNewToDoList";

	std::cout<<str<<std::endl;
    std::string post_value = "usrId="+userId+"&opCode="+param_opCode+"&usrDate="+param_date+"&usrTask="+param_task+"&usrIsDone="+param_isDone;
	std::cout<<"zakiah post_value = "+post_value<<std::endl;
	str=sendPostRequest(post_value);

	return str;
}

std::string OperationRequest::deleteToDoListBasedOnDate(std::string param_opCode,std::string param_date){
	std::string str = "zakiah deleteToDoListBasedOnDate";

	std::cout<<str<<std::endl;
    std::string post_value = "usrId="+userId+"&opCode="+param_opCode+"&usrDate="+param_date;
	std::cout<<"zakiah post_value = "+post_value<<std::endl;
	str=sendPostRequest(post_value);

	return str;
}

std::string OperationRequest::setToDoListForisDoneStatusToYesBasedOnDateANDTask(std::string param_opCode,std::string param_date,std::string param_task){
	std::string str = "zakiah deleteToDoListBasedOnDate";

	std::cout<<str<<std::endl;
    std::string post_value = "usrId="+userId+"&opCode="+param_opCode+"&usrDate="+param_date+"&usrTask="+param_task;
	std::cout<<"zakiah post_value = "+post_value<<std::endl;
	str=sendPostRequest(post_value);

	return str;
}

//zakiah13062022:end