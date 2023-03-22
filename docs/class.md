```mermaid
classDiagram
    Product <|-- ProductDVD
    Product <|-- ProductBook
    Product <|-- ProductFurniture
    ProductControler --> ProductFactoryChooser
    ProductFactoryInterface <|-- ProductDVDFactory
    ProductFactoryInterface <|-- ProductBookFactory
    ProductFactoryInterface <|-- ProductFurnitureFactory
    ProductFactoryChooser --> ProductFactoryInterface
    ProductFactoryInterface --> Product
    ProductFactoryInterface --> ProductSerializer
    Serializer <|-- ProductSerializer
    ProductSerializer <|-- ProductDVDSerializer
    ProductSerializer <|-- ProductBookSerializer
    ProductSerializer <|-- ProductFurnitureSerializer
    ModelSerializerInterface <|-- ProductSerializer
    GeneralProductsDBManager --> DB
    ProductControler --> GeneralProductsDBManager
    ProductDBManagerInterface <|-- ProductDVDDBManager
    ProductDBManagerInterface <|-- ProductBookDBManager
    ProductDBManagerInterface <|-- ProductFurnitureDBManager
    ProductSerializer --> ProductDBManagerInterface
    ProductDBManagerInterface --> GeneralProductsDBManager
    ProductDBManagerInterface --> DB
    Router --> ProductControler
    ProductControler --> Response
    Router --> Response
    FieldValidator <|-- CharFieldValidator
    FieldValidator <|-- DecimalFieldValidator
    Serializer --> FieldValidator
    GeneralProductsDBManager --> Product
    ProductDBManagerInterface --> Product

    class ProductControler{
        create(request)$
        list(request)$
        massDelete(request)$
    }
    class ProductFactoryChooser{
        getFactory(productType)$ : ProductFactoryInterface
    }
    class ProductFactoryInterface{
        getModel()
        getSerializer()
    }
    class ProductDVDFactory{

    }
    class ProductBookFactory{

    }
    class ProductFurnitureFactory{

    }
    class Product{
        <<Abstract>>
        -id
        -sku
        -name
        -price
        -type
    }
    class ProductDVD{
        -size
    }
    class ProductBook{
        -weight
    }
    class ProductFurniture{
        -height
        -width
        -length
    }
    class Serializer{
        +isValid()
        -validate()
        +getCleanedData()
    }
    class ProductSerializer{
        -id
        -sku
        -name
        -price
        -type
    }
    class ProductDVDSerializer{
        -size
    }
    class ProductBookSerializer{
        -weight
    }
    class ProductFurnitureSerializer{
        -height
        -width
        -length
    }
    class ModelSerializerInterface{
        <<Interface>>
        create()
        getInstanceData()
        getInstance()
    }
    class DB{
        getConnection()
    }
    class GeneralProductsDBManager{
        list()
        getByIDs(products_ids)
        massDelete(products)
    }

    class ProductDBManagerInterface{
        <<Interface>>
        create(product)
    }
    class ProductDVDDBManager{
        create(product)
    }
    class ProductBookDBManager{
        create(product)
    }
    class ProductFurnitureDBManager{
        create(product)
    }
    class Router{
        +get(uri, controler, method)
        +post(uri, controler, method)
        +route(request)
    }
    class Response{
        getData()
    }

    class FieldValidator{

    }
    class CharFieldValidator{

    }
    class DecimalFieldValidator{

    }
```
