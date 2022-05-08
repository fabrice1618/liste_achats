from typing import Optional
from fastapi import FastAPI

rayons = [
    { 'rayonid': 1, 'rayon': 'Divers', 'defaut': True },
    { 'rayonid': 2, 'rayon': 'Boucherie', 'defaut': False },
    { 'rayonid': 3, 'rayon': 'Primeur', 'defaut': False },
    { 'rayonid': 4, 'rayon': 'Epicerie', 'defaut': False }
]

liste = [
    {   'rayon': 'Divers', 
        'itemid': 1,
        'item': 'piles AAA',
        'coche': False
    },
    {   'rayon': 'Divers', 
        'itemid': 2,
        'item': 'dentifrice',
        'coche': False  
    },
    {   'rayon': 'Boucherie', 
        'itemid': 3,
        'item': 'Viande hachée',
        'coche': True       
    },
    {   'rayon': 'Boucherie', 
        'itemid': 4,
        'item': 'saucisse',
        'coche': True
    },
    {   'rayon': 'Primeur', 
        'itemid': 5,
        'item': 'carottes',
        'coche': False
    },
    {   'rayon': 'Primeur', 
        'itemid': 6,
        'item': 'salade',
        'coche': False
    },
    {   'rayon': 'Primeur', 
        'itemid': 7,
        'item': 'persil',
        'coche': False
    },
    {   'rayon': 'Epicerie', 
        'itemid': 8,
        'item': 'sel',
        'coche': True
    }
]

archives = [
    {   'rayon': 'Divers', 
        'itemid': 1,
        'item': 'piles AAA',
        'ordre': 1
    },
    {   'rayon': 'Divers', 
        'itemid': 2,
        'item': 'cle USB',
        'ordre': 2
    },
    {   'rayon': 'Boucherie', 
        'itemid': 3,
        'item': 'Viande hachée',
        'ordre': 3
    },
    {   'rayon': 'Boucherie', 
        'itemid': 4,
        'item': 'steack',
        'ordre': 4
    },
    {   'rayon': 'Primeur', 
        'itemid': 5,
        'item': 'carottes',
        'ordre': 5
    },
    {   'rayon': 'Primeur', 
        'itemid': 6,
        'item': 'brocoli',
        'ordre': 6
    },
    {   'rayon': 'Epicerie', 
        'itemid': 7,
        'item': 'poivre',
        'ordre': 7
    },
    {   'rayon': 'Epicerie', 
        'itemid': 8,
        'item': 'sel',
        'ordre': 8
    }
]

app = FastAPI()

@app.get("/")
def read_root():
    return {"Hello": "World"}

@app.get("/rayon/")
def liste_rayons():
    return rayons

@app.get("/liste/")
def liste_items():
    return liste

@app.get("/archive/")
def liste_archives():
    return archives
