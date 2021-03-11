package com.example.movil.ui.adapter;

import android.view.LayoutInflater;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.example.movil.AdaptadorArticulos;
import com.example.movil.R;
import com.example.movil.model.Article;

import java.util.ArrayList;

public class ArticuloAdapter extends RecyclerView.Adapter<ArticuloAdapter.ViewHolder>{

    
    private ArrayList<Article> mDataSet;

    // Obtener referencias de los componentes visuales para cada elemento
    // Es decir, referencias de los EditText, TextViews, Buttons
    public static class ViewHolder extends RecyclerView.ViewHolder {
        // en este ejemplo cada elemento consta solo de un título
        public TextView textView;
        public ViewHolder(TextView tv) {
            super(tv);
            textView = tv;
        }
    }

    // Este es nuestro constructor (puede variar según lo que queremos mostrar)
    public ArticuloAdapter() {
        mDataSet = new ArrayList();
    }

    public void setDataSet (ArrayList<Article> dataSet){
        mDataSet = dataSet;
        notifyDataSetChanged();
    }

    // El layout manager invoca este método
    // para renderizar cada elemento del RecyclerView
    @Override
    public ArticuloAdapter.ViewHolder onCreateViewHolder(ViewGroup parent,
                                                         int viewType) {
        // Creamos una nueva vista
        TextView tv = (TextView) LayoutInflater.from(parent.getContext())
                .inflate(R.layout.articulo_view, parent, false);

        // Aquí podemos definir tamaños, márgenes, paddings, etc

        return new ViewHolder(tv);
    }

    // Este método asigna valores para cada elemento de la lista
    @Override
    public void onBindViewHolder(ViewHolder holder, int i) {
        // - obtenemos un elemento del dataset según su posición
        // - reemplazamos el contenido usando tales datos

        holder.textView.setText(mDataSet.get(i).getNombre());


    }

    // Método que define la cantidad de elementos del RecyclerView
    // Puede ser más complejo (por ejem, si implementamos filtros o búsquedas)
    @Override
    public int getItemCount() {
        return mDataSet.size();
    }
}