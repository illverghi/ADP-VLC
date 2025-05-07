package com.example.area_di_progetto;

import android.Manifest;
import android.bluetooth.BluetoothAdapter;
import android.bluetooth.BluetoothManager;
import android.bluetooth.le.BluetoothLeScanner;
import android.bluetooth.le.ScanCallback;
import android.bluetooth.le.ScanResult;
import android.content.Context;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.appcompat.widget.Toolbar;
import android.content.Intent;

import android.os.Bundle;
import android.view.View;
import android.view.animation.ScaleAnimation;
import androidx.appcompat.app.AppCompatActivity;
import android.widget.Button;


public class MainActivity extends AppCompatActivity {

    private static final int REQUEST_RECORD_AUDIO_PERMISSION = 1;
    private static final int REQUEST_BLUETOOTH_PERMISSIONS = 2;

    private BluetoothLeScanner bluetoothLeScanner;
    private ScanCallback scanCallback;
    private boolean isScanning = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Gestione della barra degli strumenti
        Toolbar header = findViewById(R.id.toolbar);
        setSupportActionBar(header);
        Button bottone1 = findViewById(R.id.button1);
        Button bottone2 = findViewById(R.id.chisiamo);

        bottone1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, Dipendente1.class);
                startActivity(intent);
                ScaleAnimation scaleAnimation = new ScaleAnimation(
                        1f, 1.2f, // Da 100% a 120% in larghezza
                        1f, 1.2f, // Da 100% a 120% in altezza
                        ScaleAnimation.RELATIVE_TO_SELF, 0.5f, // Centro X
                        ScaleAnimation.RELATIVE_TO_SELF, 0.5f  // Centro Y
                );
                scaleAnimation.setDuration(200); // Durata animazione (200ms)
                scaleAnimation.setFillAfter(true); // Mantiene l'effetto finale
                v.startAnimation(scaleAnimation);
            }
        });

        bottone2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent2 = new Intent(MainActivity.this, ChiSiamo.class);
                startActivity(intent2);
            }
        });

        Button bottone3 = findViewById(R.id.button3);
        bottone3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent3 = new Intent(MainActivity.this, dipendente2.class);
                startActivity(intent3);

                ScaleAnimation scaleAnimation = new ScaleAnimation(
                        1f, 1.2f, // Da 100% a 120% in larghezza
                        1f, 1.2f, // Da 100% a 120% in altezza
                        ScaleAnimation.RELATIVE_TO_SELF, 0.5f, // Centro X
                        ScaleAnimation.RELATIVE_TO_SELF, 0.5f  // Centro Y
                );
                scaleAnimation.setDuration(200); // Durata animazione (200ms)
                scaleAnimation.setFillAfter(true); // Mantiene l'effetto finale
                v.startAnimation(scaleAnimation);
            }
        });

        Button button4 = findViewById(R.id.button4);
        button4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent4 = new Intent(MainActivity.this, Dipendente3.class);
                startActivity(intent4);

                ScaleAnimation scaleAnimation = new ScaleAnimation(
                        1f, 1.2f, // Da 100% a 120% in larghezza
                        1f, 1.2f, // Da 100% a 120% in altezza
                        ScaleAnimation.RELATIVE_TO_SELF, 0.5f, // Centro X
                        ScaleAnimation.RELATIVE_TO_SELF, 0.5f  // Centro Y
                );
                scaleAnimation.setDuration(200); // Durata animazione (200ms)
                scaleAnimation.setFillAfter(true); // Mantiene l'effetto finale
                v.startAnimation(scaleAnimation);
            }
        });




    }


}