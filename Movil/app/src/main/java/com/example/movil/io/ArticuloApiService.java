package com.example.movil.io;

import com.example.movil.model.Article;

import java.util.ArrayList;

import retrofit2.Call;
import retrofit2.http.GET;

public interface ArticuloApiService {
    @GET("articulo")
    Call<ArrayList<Article>> getArticulo();
}
