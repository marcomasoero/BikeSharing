from flask import Flask, jsonify, request
from flask_restful import Resource, Api
import sqlite3

app = Flask(__name__)
api = Api(app) 

DB_PATH = "./bikesharign.db"

def getConnection():
    conn = sqlite3.connect(DB_PATH)
    cur = conn.cursor()
    return conn, cur

class Statistiche(Resource):  #es 2 parte 2
    def get(self):
        conn, cur = getConnection()
        query = """
            SELECT COUNT(*) as numeroUtenti, b.tag
            FROM operazioni o, bici b
            WHERE o.id_bici = b.id_bici
            GROUP BY o.id_bici, b.tag
        """
        result = cur.fetchone()
        conn.close()
        if result and all(val is not None for val in result):
            return {
                "Statistica": result
            }, 200
        else:
            return "Nessun dato disponibile per la combinazione fornita", 404

"""In relazione al tema sviluppato nella prima parte, il candidato progetti una web API che consenta al comune di accedere alle statistiche di utilizzo delle biciclette.
La web API deve permettere di ottenere, per ogni bicicletta, il numero totale di utenti che l'ha utilizzata.
Il candidato delinei il progetto di massima della web API realizzandone l'implementazione con un linguaggio a scelta."""

api.add_resource(Statistiche, "/statistiche")

if __name__ == "__main__":
    app.run(debug=True)