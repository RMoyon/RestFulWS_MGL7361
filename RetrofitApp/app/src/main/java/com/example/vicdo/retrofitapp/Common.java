package com.example.vicdo.retrofitapp;

import com.example.vicdo.retrofitapp.Remote.IpService;
import com.example.vicdo.retrofitapp.Remote.RetrofitClient;
import com.example.vicdo.retrofitapp.Remote.UserService;

public class Common {

    private static final String BASE_URL = "http://10.0.2.2:8000/user";
    //private static final String BASE_URL = "http://ip.jsontest.com/";

    public static IpService getIpService(){
        return RetrofitClient.getClient(BASE_URL).create(IpService.class);
    }

    public static UserService getUserService(){
        return RetrofitClient.getClient(BASE_URL).create(UserService.class);
    }


}
