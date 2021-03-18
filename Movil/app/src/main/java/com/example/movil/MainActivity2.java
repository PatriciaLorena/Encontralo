package com.example.movil;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.movil.model.Article;
import com.squareup.picasso.Picasso;

public class MainActivity2 extends AppCompatActivity {
    private ImageView imgItemDetail;
    private TextView tvNombreDetail;
    private TextView tvDescripcionDetail;
    private Article itemDetail;

    private String domain_image = "http://192.168.0.14:8000/imagenes/articulos/";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
        setTitle(getClass().getSimpleName());

        initViews();
        initValues();
    }
    public void initViews(){
        imgItemDetail = findViewById(R.id.imgItemDetail);
        tvNombreDetail = findViewById(R.id.tvNombreDetail);
        tvDescripcionDetail = findViewById(R.id.tvDescripcionDetail);
    }

    public void initValues(){
        itemDetail = (Article) getIntent().getExtras().getSerializable("itemDetail");

        //imgItemDetail.setImageURI(itemDetail.getImagen());

        Picasso.get()
                .load(domain_image+itemDetail.getImagen())
                .into(this.imgItemDetail);
        tvNombreDetail.setText(itemDetail.getNombre());
        tvDescripcionDetail.setText(itemDetail.getDescripcion());
    }

    public void irMapa(View v){
        Intent i = new Intent(this, Ubicacion.class);
        startActivity(i);
    }
}