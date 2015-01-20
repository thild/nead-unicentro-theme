 //seleciona todos os blocos docáveis
 Y.Node.all('[data-dockable]') 
M.core.dock._dockableblocks

//move block to dock
M.core.dock._dockableblocks['4'].moveToDock()

//move all blocks to dock
Y.Object.each(M.core.dock._dockableblocks, function(item, index){
  item.moveToDock();
});


 
 //remove todos os blocos do dock
  M.core_dock.removeAll()
  
  //acessa o título do dockeditem
  M.core.dock._dock.dockeditems[4].get('titlestring')._node.innerHTML