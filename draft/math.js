/*function add(a,b) {
    return a+b
}

console.log("Node Modules")
console.log(add(1,2))
*/

const PI = 4.14

function add (a,b) {
    return a + b
}

function div (a,b) {
    if (b === 0) return "cannot divided by zero"
    else return a/b
}

module.exports = { PI, add, div};