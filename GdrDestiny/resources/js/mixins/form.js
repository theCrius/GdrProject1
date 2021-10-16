export const form = {
    methods : {
        createVModelDatas(nameObjectWhereRelateVModelProperties,listOfNames)
        {
            for (const nameOfProperty of listOfNames) 
            {
                this.$set(this[nameObjectWhereRelateVModelProperties], nameOfProperty,{ value : '' , errors : false })
            }
        },
        checkErrors(nameObjectWhereRelateVModelProperties,listOfNames)
        {
            for( const nameOfProperty of listOfNames)
            {
                if ( this[nameObjectWhereRelateVModelProperties][nameOfProperty].errors ){
                    this[nameObjectWhereRelateVModelProperties][nameOfProperty].value=null
                    return true
                }
            }
            return false
        },
        checkIfAllInputsHaveBeenWritten(nameObjectWhereRelateVModelProperties,listOfNames)
        {
            for( const nameOfProperty of listOfNames)
            {
                if ( !this[nameObjectWhereRelateVModelProperties][nameOfProperty].value ) return this[nameObjectWhereRelateVModelProperties][nameOfProperty].errors = 'Devi inserire un valore valido'
                this[nameObjectWhereRelateVModelProperties][nameOfProperty].errors = false
            }
        },
        resetData(nameObjectWhereRelateVModelProperties,listOfNames, exceptions=null)
        {
            loop1:
            for( const nameOfProperty of listOfNames)
            {
                for(const exception of exceptions)
                {
                    if( nameOfProperty == exception ) continue loop1
                }
                this[nameObjectWhereRelateVModelProperties][nameOfProperty].value = null
            }
        },
        objectToSendThroughApi(datas)
        {
            let objectToReturn = {}
            for(let key in datas)
            {
                objectToReturn[key] = datas[key].value
            }
            return objectToReturn
        },
        showErrorsInFrontEnd(errors,nameObjectWhereRelateVModelProperties,listOfNames)
        {
            console.log(errors)
            loop1:
            for( const nameOfProperty of listOfNames)
            {
                for(const errorName in errors)
                {
                    if( nameOfProperty == errorName) this[nameObjectWhereRelateVModelProperties][nameOfProperty].errors = errors[errorName][0]
                }
            }
        }

    },
}