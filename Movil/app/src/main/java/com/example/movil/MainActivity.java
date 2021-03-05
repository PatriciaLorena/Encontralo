package com.example.movil;

import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.widget.EditText;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.movil.io.ArticuloApiAdapter;
import com.example.movil.model.Article;

import com.example.movil.ui.adapter.ArticuloAdapter;

import com.example.movil.AdaptadorArticulos;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity implements Callback<ArrayList<Article>> {

    EditText etBuscador;
    RecyclerView mRecyclerView;
    AdaptadorArticulos adaptador;
    List<Article> listaArticulos;

    private ArticuloAdapter mAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mRecyclerView = findViewById(R.id.rvLista);

        mRecyclerView.setHasFixedSize(true);

        LinearLayoutManager layoutManager = new LinearLayoutManager(this);
        mRecyclerView.setLayoutManager(layoutManager);

         mAdapter = new ArticuloAdapter();
        mRecyclerView.setAdapter(mAdapter);

       //adaptador = new AdaptadorArticulos(MainActivity.this, listaArticulos);
        //mRecyclerView.setAdapter(adaptador);


        Call<ArrayList<Article>> call = ArticuloApiAdapter.getApiService().getArticulo();
        call.enqueue(this);


        etBuscador = findViewById(R.id.etBuscador);
        etBuscador.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) { }

            @Override
            public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) { }

            @Override
            public void afterTextChanged(Editable s) {
            //    filtrar(s.toString());
            }
        });

       mRecyclerView.setLayoutManager(new GridLayoutManager(this, 1));
        //listaArticulos =new ArrayList<Article>();
        //obtenerArticulos();



    }

   /* public void obtenerArticulos(){
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());

        StringRequest stringRequest = new StringRequest(Request.Method.GET,
                getResources().getString(R.string.URL_ARTICULOS),
                new com.android.volley.Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            JSONArray jsonArray = jsonObject.getJSONArray("Articulos");

                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject jsonObject1 = jsonArray.getJSONObject(i);
                                listaArticulos.add(
                                        new Article(
                                                jsonObject1.getInt("idArticulo"),
                                                jsonObject1.getString("nombre"),
                                                jsonObject1.getString("codigo"),
                                                jsonObject1.getString("descripcion")
                                        )
                                );
                            }
                            adaptador = new AdaptadorArticulos(MainActivity.this, listaArticulos);
                            mRecyclerView.setAdapter(adaptador);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new com.android.volley.Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        }
        );

        requestQueue.add(stringRequest);
    }

    public void filtrar(String texto){
        ArrayList<Article> filtrarLista = new ArrayList<Article>();

        for (Article article : listaArticulos){
            if(article.getNombre().toLowerCase().contains(texto.toLowerCase())){
                filtrarLista.add(article);
            }
        }
        adaptador.filtrar(filtrarLista);
    }*/

    @Override
    public void onResponse(Call<ArrayList<Article>> call, Response<ArrayList<Article>> response) {
        if(response.isSuccessful()){
            ArrayList<Article> articles = response.body();
            //Log.d("onResponse articles", "Size of articles =>" + articles.size());

            mAdapter.setDataSet(articles);
        }
    }

    @Override
    public void onFailure(Call<ArrayList<Article>> call, Throwable t) {

    }
}