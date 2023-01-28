
 
export function inputNumber() {
  let last = this.value
  if(! /[0-9]/.test(last[last.length - 1]) ){
    this.value = last.slice(0, -1)
  }
}
