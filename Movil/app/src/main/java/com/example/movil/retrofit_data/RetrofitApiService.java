package com.example.movil.retrofit_data;

import com.example.movil.model.Article;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface RetrofitApiService {

    @GET("articulo")
    Call<List<Article>> getItemsDB();


}
